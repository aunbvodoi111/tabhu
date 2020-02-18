<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\Subphu;
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
        // dd($cate);
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
    // public function index(Request $request,$title,$id)
    // {
    //     $news = News::where('lang',\Lib::langindex())->where('id',$id)->first();
    //     $newsPr = News::where('lang',\Lib::langindex())->where('status',1)->take(6)->get();
    //     $newsLis = News::where('lang',\Lib::langindex())->where('status',2)->take(5)->get();
    //     if($news == null){
    //        if(\Lib::langindex() == 'vi'){
    //             $news = News::where('lang',\Lib::langindex())->where('id',$id - 1)->first();
    //        }else{
    //             $news = News::where('lang',\Lib::langindex())->where('id',$id + 1)->first();
    //        }
    //     }
    //     return view('client.detail',compact('news','newsPr','newsLis'));
    // }

    public function index(Request $request,$title,$id)
    {
        // dd($title);
        $data = News::where('id',$id)->first();
        $data->view =  $data->view + 1;
        $data->save();
        if($data->lang == 'vi'){
            $request->session()->put(['lang' => 'vi']);
            \Cookie::queue('langdefault','vi',60*24*365);
         
        }else{
            $request->session()->put(['lang' => 'en']);
            \Cookie::queue('langdefault','en',60*24*365);
            
        }
        if($data->cate_id > 0){
            $lienquan = News::where('cate_id',$data->cate_id)->orderBy('id','DESC')->take(6)->get();
        }else if($data->subcate_id > 0){
            $lienquan = News::where('subcate_id',$data->subphu_id)->orderBy('id','DESC')->take(6)->get();
        }else if($data->subphu_id > 0){
            
            $lienquan = News::where('subphu_id',$data->subphu_id)->orderBy('id','DESC')->take(6)->get();
        }
        return view('client.detail',compact('data','lienquan'));
    }

    public function cate(Request $request,$title,$id)
    {
        $data = Cate::where('id',$id)->with('news')->first();
        // dd($data);
        return view('client.list',compact('data'));
    }

    public function subcate(Request $request,$subcate,$title,$id)
    {
        $data = Subcate::where('id',$id)->with('news')->first();
        return view('client.sublist',compact('data'));
    }

    public function subphu(Request $request,$subcate,$title,$id)
    {
        $data = Subphu::where('id',$id)->with('news')->first();
        $id = $data->subcate_id;
        $subphu = Subphu::where('subcate_id',$id)->orderBy('id','DESC')->get();
        // dd($news);
        return view('client.subphu',compact('data','subphu'));
    }

    
}
