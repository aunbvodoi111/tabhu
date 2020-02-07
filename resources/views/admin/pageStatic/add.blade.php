
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
                            <form action="quantri/static/edit/{{$cate->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
                              </div> --}}
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email Input</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">Please enter your email</small></div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control"><small class="help-block form-text">Please enter a complex password</small></div>
                              </div> --}}
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Textarea</label></div>
                                <div class="col-12 col-md-9">
                                  @if($cate->pageStatic != null)
                                    <textarea name="description"  id="text" cols="30" rows="25" class="ckeditor"   >{!!$cate->pageStatic->description!!}</textarea>
                                  @else
                                    <textarea name="description" id="text" cols="30" rows="25" class="ckeditor"   ></textarea>
                                  @endif
                                  <script type="text/javascript">
                                    var editor = CKEDITOR.replace('description',{
                                      language:'vi',
                                      filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                                      filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                                      filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                      filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    });
                                  </script>
                                </div>
                              </div>
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Ngôn ngữ</label></div>
                                <div class="col-12 col-md-9">
                                  <select name="lang" id="select" class="form-control">
                                    <option value="0">--Chọn ngôn ngữ--</option>
                                    <option value="1">English</option>
                                    <option value="2">Tiếng việt</option>
                                  </select>
                                </div>
                              </div> --}}
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                              </div> --}}
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