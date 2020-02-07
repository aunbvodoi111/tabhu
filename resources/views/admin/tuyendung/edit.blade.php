
        <!-- Header-->
        @extends('admin.index')
        @section('content')
        <base href="{{asset('')}}">
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
            @if(count($errors )> 0)
              @foreach($errors->all() as $err )
                  <div class="alert alert-danger">
                      {{$err}}
                  </div>
              @endforeach
            @endif
            @if(session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
            @endif
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-header">
                            <strong>Basic Form</strong> Elements
                          </div>
                          <div class="card-body card-block">
                            <form action="quantri/tuyendung/edit/{{$tuyendung->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Text" class="form-control" value="{{$tuyendung->title}}"></div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên công ty</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="namecty" placeholder="Text" class="form-control" value="{{$tuyendung->namecty}}"></div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mức lương</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="price" placeholder="Text" class="form-control" value="{{$tuyendung->price}}"></div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Yêu cầu kĩ năng</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="skill" placeholder="Text" class="form-control" value="{{$tuyendung->skill}}"></div>
                              </div>
                              <div class="row form-group">
                                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Địa điểm</label></div>
                                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="point" placeholder="Text" class="form-control" value="{{$tuyendung->point}}"></div>
                                </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label" >Ngày hết hạn</label></div>
                                <div class="col-12 col-md-9"><input type="date" name="expired" max="3000-12-31" 
                                  min="1000-01-01" class="form-control" value="{!!$tuyendung->expired!!}"></div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Textarea</label></div>
                                <div class="col-12 col-md-9">
                                  <textarea name="job" id="text" cols="30" rows="25" class="ckeditor" >{!!$tuyendung->job!!}</textarea>
                                  <script type="text/javascript">
                                    var editor = CKEDITOR.replace('job',{
                                      language:'vi',
                                      filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                                      filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                                      filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                      filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    });
                                  </script>
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Ngôn ngữ</label></div>
                                <div class="col-12 col-md-9">
                                  <select name="lang" id="select" class="form-control">
                                    <option value="0">--Chọn ngôn ngữ--</option>
                                    <option value="en" @if($tuyendung->lang == 'en' ) selected @endif >English</option>
                                    <option value="vi" @if($tuyendung->lang == 'vi' ) selected @endif >Tiếng việt</option>
                                  </select>
                                </div>
                              </div>
                              {{-- <div class="row form-group">
                                  <div class="col col-md-3"><label for="select" class=" form-control-label">Ngôn ngữ</label></div>
                                  <div class="col-12 col-md-9">
                                    <select name="status" id="select" class="form-control">
                                      <option value="0">--Chọn loại tin--</option>
                                      <option value="1">Sản phẩm</option>
                                      <option value="2">Tin tức</option>
                                    </select>
                                  </div>
                                </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Ngôn ngữ</label></div>
                                  <div class="col-12 col-md-9">
                                    <select name="subcate_id" id="select" class="form-control" name="subcate_id">
                                      <option value="0">--Chọn danh mục--</option>
                                      @foreach($subcate as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              </div> --}}
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Radios</label></div>
                                <div class="col col-md-9">
                                  <div class="form-check">
                                    <div class="radio">
                                      <label for="radio1" class="form-check-label ">
                                        <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Option 1
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label for="radio2" class="form-check-label ">
                                        <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Option 2
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label for="radio3" class="form-check-label ">
                                        <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Option 3
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Checkboxes</label></div>
                                <div class="col col-md-9">
                                  <div class="form-check">
                                    <div class="checkbox">
                                      <label for="checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label for="checkbox2" class="form-check-label ">
                                        <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                                      </label>
                                    </div>
                                    <div class="checkbox">
                                      <label for="checkbox3" class="form-check-label ">
                                        <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                              <div class="row form-group">
                                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                                  <div class="col-12 col-md-9"><img src="img/{{$tuyendung->image}}" alt=""></div>
                                </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                              </div>
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple File input</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file"></div>
                              </div> --}}
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                              <i class="fa fa-ban"></i> Reset
                            </button>
                          </div>
                        </div>
                      </form>
                      </div>
        
                    </div>
        
        
                </div><!-- .animated -->
            </div><!-- .content -->
        
        
          </div><!-- /#right-panel -->
        
            <!-- Right Panel -->
        
        
            
            <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
        
        @endsection
        {{-- <style> 
          #cke_text { 
              min-height: 400px; 
          } 
          #cke_1_bottom{
            min-height: 400px; 
          }
          </style>  --}}