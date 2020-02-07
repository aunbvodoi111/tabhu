<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use App\detailTrailer;
class GioithieuController extends Controller
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
    public function index(Request $request,$title,$id,$idnew)
    {
        if(\Lib::langindex() == 'vi'){
            $data = Cate::where('lang',\Lib::langindex())->where('title','Giới thiệu')->with('subcates')->first();
            $detailTrailer = detailTrailer::where('trailer_id',$idnew)->first();
            return view('client.gioithieu',compact('data','detailTrailer'));
        }else{
            $data = Cate::where('lang',\Lib::langindex())->where('title','About Us')->with('subcates')->first();
            $detailTrailer = detailTrailer::where('trailer_id',$idnew)->first();
            return view('client.gioithieu',compact('data','detailTrailer'));
        }
    }
}
