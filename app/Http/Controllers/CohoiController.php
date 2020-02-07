<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use App\PageStatic;
class CohoiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $cate = Cate::where('lang',\Lib::lang())->get();
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
    public function index(Request $request)
    {
        if(\Lib::langindex() == 'vi'){
            $data = PageStatic::where('cate_id',10)->first();
        }else{
            $data = PageStatic::where('cate_id',11)->first();
        }
        return view('client.cohoi',compact('data'));
    }
}
