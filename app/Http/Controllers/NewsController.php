<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcate;
use App\Cate;
use App\News;
use App\Subphu;
class NewsController extends Controller
{
    public function getList()
    {
    	$news = News::all();
    	return view('admin.news.index',compact('news'));
	}
	
	public function getEdit($id)
    {
		$news = News::where('id',$id)->first();
		$subcate = Subcate::get();
		$subphu = Subphu::get();
		$cate = Cate::where('status',0)->get();
    	return view('admin.news.edit',compact('news','subcate','subphu','cate'));
	}

	
	public function postEdit(Request $res,$id)
    {
		// dd(1);
		$news = News::find($id);
		$this->validate($res, 
    		[
				'title'=>'required|min:3|max:100',
				'lang'=>'required',
				'status'=>'required',
				'description'=>'required',
				'subphu_id'=>'required',
    		],
    		[
    			'title.required'=>'Bạn chưa nhập danh mục chính',
				'title.min'=>'Tên phải có nhiều hơn 3 kí tự',
				'lang.required'=>'Bạn chưa chọn ngôn ngữ',
				'subphu_id.required'=>'Bạn chưa chọn danh mục phụ',
				'description.required'=>'Bạn chưa nhập miêu tả',
				'status.required'=>'bạn chưa chọn loại danh mục',
				'title.max'=>'Tên phải có ít hơn 100 kí tự',
    		]);
		$news->title = $res->title;
		$news->subcate_id = $res->subcate_id;
		$news->lang = $res->lang;
		$news->description = $res->description;
		$news->subphu_id = $res->subphu_id;
		if($res->status == 6 || $res->status == 7){
			$news->status = 1;
		}else if($res->status == 6 || $res->status == 7){
			$news->status = 2;
		}
		
		if($res->hasFile('image'))
			{
				$file=$res->file('image');
				$name= $file->getClientOriginalName();
				$image = str_random()."_".$name;
				$file->move("img",$image);
				$news->image = $image;
			}
    	$news->save();

    	return  redirect('quantri/new/list')->with('thongbao','Bạn đã sửa thành công');
	}

    public function getAdd()
    {
		$subcate = Subcate::get();
		$cate = Cate::where('status',0)->get();
		$subphu = Subphu::get();
    	return view('admin.news.add',compact('subcate','subphu','cate'));
	}
	
    public function postAdd(Request $res)
    {
		// dd($res->all());
    	$this->validate($res, 
    		[
				'title'=>'required|min:3|max:100',
				'lang'=>'required',
				'status'=>'required',
				'description'=>'required',
				'subphu_id'=>'required',
				'image'=>'required',
    		],
    		[
    			'title.required'=>'Bạn chưa nhập danh mục chính',
				'title.min'=>'Tên phải có nhiều hơn 3 kí tự',
				'lang.required'=>'Bạn chưa chọn ngôn ngữ',
				'subphu_id.required'=>'Bạn chưa chọn danh mục phụ',
				'description.required'=>'Bạn chưa nhập miêu tả',
				'status.required'=>'bạn chưa chọn loại danh mục',
				'title.max'=>'Tên phải có ít hơn 100 kí tự',
				'image.required'=>'Bạn chưa chọn hình ảnh',
    		]);
    	$news = new News();
		$news->title = $res->title;
		$news->subcate_id = $res->subcate_id;
		$news->lang = $res->lang;
		$news->subphu_id = $res->subphu_id;
		$news->description = $res->description;
		if($res->status == 6 || $res->status == 7){
			$news->status = 1;
		}else if($res->status == 6 || $res->status == 7){
			$news->status = 2;
		}
		if($res->hasFile('image'))
			{
				$file=$res->file('image');
				$name= $file->getClientOriginalName();
				$image = str_random()."_".$name;
				$file->move("img",$image);
				$news->image = $image;
			}
    	$news->save();

    	return  redirect('quantri/new/add')->with('thongbao','Bạn đã thêm thành công');
    }
}
