<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\News;
use App\detailTrailer;
use App\Dichvu;
class DichvuController extends Controller
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


    public function getList()
    {
    	$news = Subcate::where('cate_id',16)->orwhere('cate_id',17)->get();
    	return view('admin.dichvunew.index',compact('news'));
    }
    public function getAdd()
    {
		$subcate = Subcate::where('status',0)->get();
    	return view('admin.dichvunew.add',compact('subcate'));
    }
    public function postAdd(Request $res,$id)
    {
    	// $this->validate($res, 
    	// 	[
		// 		'title'=>'required|min:3|max:100',
		// 		'lang'=>'required',
		// 		'status'=>'required',
    	// 	],
    	// 	[
    	// 		'title.required'=>'Bạn chưa nhập danh mục chính',
		// 		'title.min'=>'Tên phải có nhiều hơn 3 kí tự',
		// 		'lang.min'=>'Bạn chưa chọn ngôn ngữ',
		// 		'status.min'=>'bạn chưa chọn loại danh mục',
    	// 		'title.max'=>'Tên phải có ít hơn 100 kí tự',
		// 	]);
		$detailTrailer = Dichvu::where('dichvu_id',$id)->first();
		if($detailTrailer){
			$detailTrailer->dichvu_id = $id;
			$detailTrailer->description = $res->description;
			if($res->hasFile('image'))
			{
				$file=$res->file('image');
				$name= $file->getClientOriginalName();
				$image = str_random()."_".$name;
				$file->move("img",$image);
				$detailTrailer->image = $image;
			}else{
				$detailTrailer->image = $detailTrailer->image;
			}
			$detailTrailer->save();
		}
    	else{
			$news = new Dichvu();
			$news->dichvu_id = $id;
			$news->description = $res->description;
			if($res->hasFile('image'))
				{
					$file=$res->file('image');
					$name= $file->getClientOriginalName();
					$image = str_random()."_".$name;
					$file->move("img",$image);
					$news->image = $image;
				}
			$news->save();
		}

    	return  redirect('quantri/dichvunew/list')->with('thongbao','Bạn đã thêm thành công');
	}
	
	public function getEdit($id)
    {
		$detailTrailer = Dichvu::where('dichvu_id',$id)->first();
		// if($cate->pageStatic){
		// 	$cate = $cate;
		// }else{
		// 	$cate->pageStatic = null;
		// }	
		// dd($cate); 
		$cate = [];
    	return view('admin.dichvunew.add',compact('detailTrailer','id'));
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
            $data = Cate::where('lang',\Lib::langindex())->where('title','Dịch vụ')->with('subcates')->first();
            $detailTrailer = Dichvu::where('dichvu_id',$idnew)->first();
            return view('client.dichvu',compact('data','detailTrailer'));
        }else{
            $data = Cate::where('lang',\Lib::langindex())->where('title','Service')->with('subcates')->first();
            $detailTrailer = Dichvu::where('dichvu_id',$idnew)->first();
            return view('client.dichvu',compact('data','detailTrailer'));
        }
    }
}
