
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
                          <form action="quantri/trailer/add/{{$id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="row form-group">
                                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Textarea</label></div>
                                 @if($detailTrailer)
                                  <div class="col-12 col-md-9">
                                      <textarea name="description" id="text" cols="30" rows="25" class="ckeditor" >{!! $detailTrailer->description !!}</textarea>
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
                                  <div class="row form-group">
                                    <img src="img/{{ $detailTrailer->image }}" alt="">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" value='{{ $detailTrailer->image }} ' class="form-control-file"></div>
                                  </div>
                                 @else
                                 <div class="col-12 col-md-9">
                                      <textarea name="description" id="text" cols="30" rows="25" class="ckeditor" ></textarea>
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
                                  <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                  </div>
                                 @endif
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