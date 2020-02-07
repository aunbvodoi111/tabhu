<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\PageStatic;
class StaticController extends Controller
{
    public function getList()
    {
    	$cate = Cate::where('status',1)->with('pageStatic')->get();
    	return view('admin.pageStatic.index',compact('cate'));
    }
    public function getAdd()
    {
    	return view('admin.pageStatic.add');

	}
	
	public function getEdit($id)
    {
		$cate = Cate::where('status',1)->where('id',$id)->with('pageStatic')->first();
		if($cate->pageStatic){
			$cate = $cate;
		}else{
			$cate->pageStatic = null;
		}	
		// dd($cate);
    	return view('admin.pageStatic.add',compact('cate'));
	}

	public function postEdit(Request $res,$id)
    {
		$pageStatic = PageStatic::where('cate_id',$id)->first();
		if($pageStatic){
			$pageStatic->cate_id = $id;
			$pageStatic->description = $res->description;
			$pageStatic->save();
		}else{
			$pageStatic = new PageStatic;
			$pageStatic->cate_id = $id;
			$pageStatic->description = $res->description;
			$pageStatic->save();
		}
		$cate = Cate::where('status',1)->with('pageStatic')->get();
		
    	return view('admin.pageStatic.index',compact('cate'));
	}

    public function postAdd(Request $res)
    {
    	$this->validate($res,
    		[
				'title'=>'required|min:3|max:100',
				'lang'=>'required',
				'status'=>'required',
    		],
    		[
    			'title.required'=>'Bạn chưa nhập danh mục chính',
				'title.min'=>'Tên phải có nhiều hơn 3 kí tự',
				'lang.min'=>'Bạn chưa chọn ngôn ngữ',
				'status.min'=>'bạn chưa chọn loại danh mục',
    			'title.max'=>'Tên phải có ít hơn 100 kí tự',
    		]);
    	$cate = new cate();
		$cate->title = $res->title;
		$cate->lang = $res->lang;
		$cate->status = $res->status;
    	$cate->save();

    	return  redirect('quantri/pageStatic/add')->with('thongbao','Bạn đã thêm thành công');
    }
}
