<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\Subcate;
use App\CustomerContribute;
use App\CustomerContact;
use App\CustomerCooperate;
class DonggopController extends Controller
{
    public function getList()
    {
    	$hoptac = CustomerContribute::all();
    	return view('admin.donggop.index',compact('hoptac'));
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

    	return  redirect('quantri/cate/add')->with('thongbao','Bạn đã thêm thành công');
		
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

    	return  redirect('quantri/cate/add')->with('thongbao','Bạn đã thêm thành công');
    }
}
