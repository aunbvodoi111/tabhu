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
        $cate = Cate::with('subcates')->get();
        
        \View::share('cate', $cate);
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::orderBy('id','DESC')->inRandomOrder()->get();
        return view('client.index',compact('news'));
    }

    public function notfound()
    {
        return view('client.notfound');
    }

    public function search(Request $request){
        $news = News::where('title','like', '%' . $request->search . '%')->get();
        $keyword = $request->search;
          return view('client.search',compact('news','keyword'));
      }
}
