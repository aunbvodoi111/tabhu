<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcate;
use App\Cate;
use App\Tuyendung;
class TuyendungController extends Controller
{
	public function __construct(Request $request)
    {
        $cate = Cate::where('lang',\Lib::lang())->get();
        \View::share('cate', $cate);
	}
	
    public function getList()
    {
    	$data = Tuyendung::all();
    	return view('admin.tuyendung.index',compact('data'));
	}
	
    public function getAdd()
    {
		$cate = Cate::where('status','>',0)->get();
    	return view('admin.tuyendung.add',compact('cate'));
	}

	public function detail($title,$id)
    {
		$tuyedung = Tuyendung::find($id);
		$tuyendungs = Tuyendung::where('lang',\Lib::langindex())->take(6)->get();
    	return view('client.detailTd',compact('tuyedung','tuyendungs'));
	}
	 
	public function getEdit($id)
    {
		$tuyendung = Tuyendung::where('id',$id)->first();
    	return view('admin.tuyendung.edit',compact('tuyendung'));
	}

	public function postEdit(Request $res,$id)
    {
		$this->validate($res,
    		[
				'title'=>'required|min:3|max:100',
				'lang'=>'required',
				'price'=>'required',
				'namecty'=>'required',
				'skill'=>'required',
				'expired'=>'required',
				'lang'=>'required',
				'job'=>'required',
				'point'=>'required',
    		],
    		[
				'title.required'=>'Vui lòng nhập tiêu đề',
				'namecty.required'=>'Vui lòng nhập tên công ty',
				'skill.required'=>'Vui lòng nhập kĩ năng yêu cầu ',
				'expired.required'=>'Vui lòng chọn ngày hết hạn',
				'lang.required'=>'Vui lòng chọn ngôn ngữ',
				'job.min'=>'Vui lòng nhập nội dung công việc',
				'lang.required'=>'Bạn chưa chọn ngôn ngữ',
				'point.min'=>'Bạn chưa chọn địa điểm',
    			'title.max'=>'Tên phải có ít hơn 100 kí tự',
    		]);
		$tuyendung = Tuyendung::find($id);
		$tuyendung->title = $res->title;
		$tuyendung->namecty = $res->namecty;
		$tuyendung->price = $res->price;
		$tuyendung->skill = $res->skill;
		$tuyendung->expired = $res->expired;
		$tuyendung->job	 = $res->job;
		$tuyendung->point = $res->point;
		$tuyendung->lang = $res->lang;
		if($res->hasFile('image'))
			{
				$file=$res->file('image');
				$name= $file->getClientOriginalName();
				$image = str_random()."_".$name;
				$file->move("img",$image);
				$tuyendung->image = $image;
			}
    	$tuyendung->save();

    	return  redirect('quantri/tuyendung/add')->with('thongbao','Bạn đã thêm thành công');
	}
    public function postAdd(Request $res)
    {
    	$this->validate($res,
    		[
				'title'=>'required|min:3|max:100',
				'lang'=>'required',
				'price'=>'required',
				'namecty'=>'required',
				'skill'=>'required',
				'expired'=>'required',
				'lang'=>'required',
				'job'=>'required',
				'point'=>'required',
    		],
    		[
				'title.required'=>'Vui lòng nhập tiêu đề',
				'namecty.required'=>'Vui lòng nhập tên công ty',
				'skill.required'=>'Vui lòng nhập kĩ năng yêu cầu ',
				'expired.required'=>'Vui lòng chọn ngày hết tuyển',
				'lang.required'=>'Vui lòng chọn ngôn ngữ',
				'job.min'=>'Vui lòng nhập nội dung công việc',
				'point.min'=>'Bạn chưa chọn địa điểm',
				'lang.required'=>'Bạn chưa chọn ngôn ngữ',
    			'title.max'=>'Tên phải có ít hơn 100 kí tự',
    		]);
    	$tuyendung = new Tuyendung();
		$tuyendung->title = $res->title;
		$tuyendung->namecty = $res->namecty;
		$tuyendung->price = $res->price;
		$tuyendung->skill = $res->skill;
		$tuyendung->point = $res->point;
		$tuyendung->expired = $res->expired;
		$tuyendung->job	 = $res->job;
		$tuyendung->lang = $res->lang;
		if($res->hasFile('image'))
			{
				$file=$res->file('image');
				$name= $file->getClientOriginalName();
				$image = str_random()."_".$name;
				$file->move("img",$image);
				$tuyendung->image = $image;
			}
    	$tuyendung->save();

    	return  redirect('quantri/tuyendung/add')->with('thongbao','Bạn đã thêm thành công');
	}
	
	public function index(Request $request)
    {
		$tuyendung = Tuyendung::where('lang',\Lib::langindex())->get();
        return view('client.tuyendung',compact('tuyendung'));
    }
}
