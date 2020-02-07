<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use App\Subcate;
class NewsHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $cate = Cate::where('lang',\Lib::lang())->with('subcates')->get();
        \View::share('cate', $cate);
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        return redirect()->back();
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
    public function indexPid(Request $request,$title,$titlep,$id,$titlet,$pid){
        $data = News::where('subphu_id',$pid)->where('lang',\Lib::langindex())->paginate(10);
       
        return view('client.listnews',compact('data'));
    }


    public function index(Request $request,$title,$pid,$id)
    {
        $data = News::where('subcate_id',$id)->where('lang',\Lib::langindex())->paginate(10);
       
        return view('client.listnews',compact('data'));
    }
}
