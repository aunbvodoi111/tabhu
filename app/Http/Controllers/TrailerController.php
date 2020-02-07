<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcate;
use App\Cate;
use App\News;
use App\detailTrailer;
class TrailerController extends Controller
{
    public function getList()
    {
    	$news = Subcate::where('cate_id',4)->orwhere('cate_id',5)->get();
    	return view('admin.trailer.index',compact('news'));
    }
    public function getAdd()
    {
		$subcate = Subcate::where('status',0)->get();
    	return view('admin.trailer.add',compact('subcate'));
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
		$detailTrailer = detailTrailer::where('trailer_id',$id)->first();
		if($detailTrailer){
			$detailTrailer->trailer_id = $id;
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
			$news = new detailTrailer();
			$news->trailer_id = $id;
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

    	return  redirect('quantri/trailer/list')->with('thongbao','Bạn đã thêm thành công');
	}
	
	public function getEdit($id)
    {
		$detailTrailer = detailTrailer::where('trailer_id',$id)->first();
		// if($cate->pageStatic){
		// 	$cate = $cate;
		// }else{
		// 	$cate->pageStatic = null;
		// }	
		// dd($cate); 
		$cate = [];
    	return view('admin.trailer.add',compact('detailTrailer','id'));
	}
}
