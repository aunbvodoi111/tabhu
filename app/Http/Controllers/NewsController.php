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

	public function getDelete($id){
		$cate = News::find($id);
		$cate->delete();
		return  redirect('quantri/new/list')->with('thongbao','Bạn đã thêm thành công');
	}
	public function postEdit(Request $res,$id)
    {
		// dd($res->input('detail'));
		$this->validate($res, 
		[
			'title'=>'required|min:3|max:100',
			'lang'=>'required',
			'status'=>'required',
			
			'subphu_id'=>'required',
			
			'detail' => 'required',
		],
		[
			'title.required'=>'Bạn chưa nhập danh mục chính',
			'title.min'=>'Tên phải có nhiều hơn 3 kí tự',
			'lang.required'=>'Bạn chưa chọn ngôn ngữ',
			'subphu_id.required'=>'Bạn chưa chọn danh mục phụ',
			
			'status.required'=>'bạn chưa chọn loại danh mục',
			'title.max'=>'Tên phải có ít hơn 100 kí tự',
		
		]);
		$news = News::find($id);
		$detail=$res->input('detail');
				
			$dom = new \DomDocument();


@$dom->loadHTML( $detail );
		$images = $dom->getElementsByTagName('img');
			
			foreach($images as $k => $img){
					
					$data = $img->getAttribute('src');
					$pos = strpos($data, 'base');
					if($pos !== false){
						// dd(explode(',', $data)[0]);
						// dd( explode(';', $data));
					list($type, $data) = explode(';', $data);
		
					list(, $data)      = explode(',', $data);
		
					$data = base64_decode($data);
		
					$image_name= "/upload/" . time().$k.'.png';
		
					$path = public_path() . $image_name;
		
					file_put_contents($path, $data);
		
					$img->removeAttribute('src');
		
					$img->setAttribute('src', $image_name);
				// dd($image_name);
					}
	
			}
$detail = $dom->saveHTML( $dom->documentElement );
		
			$news->title = $res->title;
			$news->subcate_id = $res->subcate_id;
			$news->lang = $res->lang;
			$news->short_title = 'Với Firebase, bạn có thể lưu trữ và đồng bộ hóa dữ liệu lên NoSQL cloud database.';
			$news->subphu_id = 1;
			$news->cate_id = 1;
			$news->user_id = 1;
			$news->status = 1;
			$news->description = $detail;
		
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
		
		
    	$this->validate($res, 
    		[
				'title'=>'required|min:3|max:100',
				'lang'=>'required',
				'status'=>'required',
				
				'subphu_id'=>'required',
				'image'=>'required',
				'detail' => 'required',
    		],
    		[
    			'title.required'=>'Bạn chưa nhập danh mục chính',
				'title.min'=>'Tên phải có nhiều hơn 3 kí tự',
				'lang.required'=>'Bạn chưa chọn ngôn ngữ',
				'subphu_id.required'=>'Bạn chưa chọn danh mục phụ',
				
				'status.required'=>'bạn chưa chọn loại danh mục',
				'title.max'=>'Tên phải có ít hơn 100 kí tự',
				'image.required'=>'Bạn chưa chọn hình ảnh',
			]);
	
			$detail=$res->input('detail');
				
			$dom = new \DomDocument();


@$dom->loadHTML('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . $detail ); // important!



			
	
			$images = $dom->getElementsByTagName('img');
	
			foreach($images as $k => $img){
	
				$data = $img->getAttribute('src');
				// dd($data);
				// dd();
				if(explode(';', $data)[0]){
					list($type, $data) = explode(';', $data);
				// dd($data);
		
					list(, $data)      = explode(',', $data);
					
					$data = base64_decode($data);
					
					$image_name= "/upload/" . time().$k.'.png';
		
					$path = public_path() . $image_name;
					
					file_put_contents($path, $data);
		
					$img->removeAttribute('src');
		
					$img->setAttribute('src', $image_name);
				}
				
				// dd($image_name);
	
			}
$detail = $dom->saveHTML( $dom->documentElement );
			// $detail = $dom->saveHTML();

			
    	$news = new News();
		$news->title = $res->title;
		$news->subcate_id = $res->subcate_id;
		$news->lang = $res->lang;
		$news->short_title = 'Với Firebase, bạn có thể lưu trữ và đồng bộ hóa dữ liệu lên NoSQL cloud database.';
		$news->subphu_id = 1;
		$news->cate_id = 1;
		$news->user_id = 1;
		$news->status = 1;
		$news->description = $detail;
		
		
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
