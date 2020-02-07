<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
class DetailController extends Controller
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
    public function index(Request $request,$title,$id)
    {
        $news = News::where('lang',\Lib::langindex())->where('id',$id)->first();
        $newsPr = News::where('lang',\Lib::langindex())->where('status',1)->take(6)->get();
        $newsLis = News::where('lang',\Lib::langindex())->where('status',2)->take(5)->get();
        if($news == null){
           if(\Lib::langindex() == 'vi'){
                $news = News::where('lang',\Lib::langindex())->where('id',$id - 1)->first();
           }else{
                $news = News::where('lang',\Lib::langindex())->where('id',$id + 1)->first();
           }
        }
        return view('client.detailnews',compact('news','newsPr','newsLis'));
    }
}
