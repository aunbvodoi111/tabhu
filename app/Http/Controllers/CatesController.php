<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
class CatesController extends Controller
{
    public function getList()
    {
    	$cate = Cate::all();
    	return view('admin.cates.index',compact('cate'));
    }
    public function getAdd()
    {
    	return view('admin.cates.add');

	}
	
	public function getDelete($id){
		$cate = Cate::find($id);
		$cate->delete();
		return  redirect('quantri/cate/list')->with('thongbao','Bạn đã thêm thành công');
	}

	public function getEdit($id)
    {
		$cate = Cate::where('id',$id)->first();
    	return view('admin.cates.edit',compact('cate'));
	}

	public function postEdit(Request $res,$id)
    {
		// dd(1);
		$cate = Cate::find($id);
		
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
		$cate->title = $res->title;
		$cate->lang = $res->lang;
		$cate->status = $res->status;
		$cate->save();

    	return  redirect('quantri/cate/list')->with('thongbao','Bạn đã sửa thành công');
		
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
		$cate->icon = $res->icon;
		$cate->lang = $res->lang;
		$cate->status = $res->status;
    	$cate->save();

    	return  redirect('quantri/cate/add')->with('thongbao','Bạn đã thêm thành công');
    }
}
