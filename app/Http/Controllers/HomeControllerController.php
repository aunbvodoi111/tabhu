<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $cate = Cate::where('lang',\Lib::lang())->get();
        
        \View::share('cate', $cate);
        // $this->middleware('auth');
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd(\Lib::lang()); dd((\Cookie::get('langdefault')));
        $news = News::where('lang',\Cookie::get('langdefault'))->orderBy('id','DESC')->inRandomOrder()->orderBy('id','DESC')->get();
        return view('client.index',compact('news'));
    }

    public function notfound()
    {
        return view('client.notfound');
    }

    public function search(Request $request){
        $news = News::where('lang',\Cookie::get('langdefault'))->where('title','like', '%' . $request->search . '%')->orderBy('id','DESC')->get();
        $keyword = $request->search;
          return view('client.search',compact('news','keyword'));
      }
}
