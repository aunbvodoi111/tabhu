<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use App\PageStatic;
class ContactController extends Controller
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
    public function index(Request $request)
    {
        if(\Lib::langindex() == 'vi'){
            $data = PageStatic::where('cate_id',14)->first();
        }else{
            $data = PageStatic::where('cate_id',15)->first();
        }
        return view('client.lienhe',compact('data'));
    }
}
