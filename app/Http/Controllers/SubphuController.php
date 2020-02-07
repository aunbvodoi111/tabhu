<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcate;
use App\Cate;
use App\Subphu;
class SubphuController extends Controller
{
    public function getList()
    {
    	$cate = Subcate::all();
    	return view('admin.subphu.index',compact('cate'));
	}
	
	public function getEdit($id)
    {
		$cate = Cate::all();
		$subcates = Subcate::where('id',$id)->first();
    	return view('admin.subphu.edit',compact('subcates','cate'));
	}

	public function postEdit(Request $res,$id)
    {
		// dd(1);
		$subcate = Subphu::find($id);
		
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
		$subcate->title = $res->title;
		$subcate->cate_id = $res->cate_id;
		$subcate->lang = $res->lang;
		$subcate->status = $res->status;
    	$subcate->save();

    	return  redirect('quantri/subphu/list')->with('thongbao','Bạn đã sửa thành công');
		
    	return view('admin.subphu.index',compact('cate'));
	}

    public function getAdd()
    {
		$cate = Subcate::get();
    	return view('admin.subphu.add',compact('cate'));
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
    	$subcate = new Subphu();
		$subcate->title = $res->title;
		$subcate->subcate_id = $res->subcate_id;
		$subcate->lang = $res->lang;
		$subcate->status = $res->status;
    	$subcate->save();

    	return  redirect('quantri/subphu/add')->with('thongbao','Bạn đã thêm thành công');
    }
}
