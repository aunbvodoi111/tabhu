<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use App\Subphu;
use App\Subcate;
use App\CustomerContribute;
use App\CustomerContact;
use App\CustomerCooperate;
class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $cate = Cate::where('lang',\Lib::lang())->get();
        // dd(\Lib::lang());
        \View::share('cate', $cate);
        // $this->middleware('auth');
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        return redirect()->back();
    }


    public function init(Request $request, $cmd){
        $data = [];
        switch ($cmd) {
            case 'addcontact':
                $data = $this->addcontact($request);
                break;
            case 'addop':
                $data = $this->addop($request);
                break;
            case 'addcontribute':
                $data = $this->addcontribute($request);
                break;
            // case 'subcate':
            //     $data = $this->subcate($request);
            //     break;
            default:
                $data = $this->nothing();
        }
        return response()->json($data);
    }

    private $langActive = [
        'vi',
        'en',
    ];

    public function lang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);
            \Cookie::queue('langdefault',$lang,60*24*365);
            return redirect()->back();
        }
    }

   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function addcontact(Request $request)
    {
        $validate = \Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'name' => 'required',
                'content' => 'required',
            ],
            [
                'email.required' => __('site.chuanhapemail'),
                'email.email' => __('site.dinhdangemailkhongdung'),
                'name.required' => __('site.chuanhapten'),
                'content.required' => __('site.chuanhapnoidung'),
            ]
        );
        if ($validate->fails()) {
            $data = [
                'text' => $validate->errors()->all(),
                'error' => __('site.error'), 
            ];
            return \Lib::ajaxRespond(false, 'error', $data);
        }else{
            $data = new CustomerContribute;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->content = $request->content;
            $data->save();
            return \Lib::ajaxRespond(true, 'success', __('site.guithanhcong'));
        } 
    }

    public function addop(Request $request)
    {
        $validate = \Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'name' => 'required',
                'content' => 'required',
                'phone' => 'required',
            ],
            [
                'email.required' => __('site.chuanhapemail'),
                'email.email' => __('site.dinhdangemailkhongdung'),
                'name.required' => __('site.chuanhapten'),
                'content.required' => __('site.chuanhapnoidung'),
                'phone.required' => __('site.chuanhapphone'),
            ]
        );
        if ($validate->fails()) {
            $data = [
                'text' => $validate->errors()->all(),
                'error' => __('site.error'), 
            ];
            return \Lib::ajaxRespond(false, 'error', $data);
        }else{
            $data = new CustomerCooperate;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->content = $request->content;
            $data->save();
            return \Lib::ajaxRespond(true, 'success', __('site.guithanhcong'));
        } 
    }

    public function addcontribute(Request $request)
    {
        $validate = \Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'name' => 'required',
                'content' => 'required',
            ],
            [
                'email.required' => __('site.chuanhapemail'),
                'email.email' => __('site.dinhdangemailkhongdung'),
                'name.required' => __('site.chuanhapten'),
                'content.required' => __('site.chuanhapnoidung'),
            ]
        );
        if ($validate->fails()) {
            $data = [
                'text' => $validate->errors()->all(),
                'error' => __('site.error'), 
            ];
            return \Lib::ajaxRespond(false, 'error', $data);
        }else{
            $data = new CustomerContact;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->content = $request->content;
            $data->save();
            return \Lib::ajaxRespond(true, 'success', __('site.guithanhcong'));
        } 
    }

    public function subcates(Request $request)
    {
        $subphu = Subphu::where('subcate_id',$request->id)->get();
        foreach( $subphu as $item){
            echo"<option value='".$item->id."'>".$item->title."</option>";
        }
    }

    public function cates(Request $request)
    {
        $subphu = Subcate::where('cate_id',$request->id)->get();
        foreach( $subphu as $item){
            echo"<option value='".$item->id."'>".$item->title."</option>";
        }
    }
}
