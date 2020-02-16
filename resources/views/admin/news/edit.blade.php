
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script> 



<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js-->

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
        
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
                            <form action="quantri/new/edit/{{$news->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tiêu đề</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Text" class="form-control" value="{!!$news->title!!}"><small class="form-text text-muted">This is a help text</small></div>
                              </div>
                              {{-- <div class="row form-group">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email Input</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">Please enter your email</small></div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                                <div class="col-12 col-md-9"><input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control"><small class="help-block form-text">Please enter a complex password</small></div>
                              </div> --}}
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label" id="content" >Textarea</label></div>
                                <div class="col-12 col-md-9">
                                  <textarea class="form-control summernote" name="detail" > {!!$news->description!!} </textarea>
                                </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Ngôn ngữ</label></div>
                                <div class="col-12 col-md-9">
                                  <select name="lang" id="select" class="form-control">
                                    <option value="0">--Chọn ngôn ngữ--</option>
                                    <option value="en" @if($news->lang == 'en' ) selected @endif>English</option>
                                    <option value="vi" @if($news->lang == 'vi' ) selected @endif>Tiếng việt</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col col-md-3"><label for="select" class=" form-control-label">Loại tin</label></div>
                                  <div class="col-12 col-md-9">
                                    <select name="status" id="chang_cate" class="form-control ">
                                      <option value="0">--Chọn loại tin--</option>
                                       @foreach($cate as $item)
                                        <option value="{{$item->id}}" @if($news->subcate_id == $item->id ) selected @endif >{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                  <div class="col-12 col-md-9">
                                    <select name="subcate_id" id="chang_subcate" class="form-control subcate" name="subcate_id">
                                      <option value="0">--Chọn danh mục--</option>
                                      @foreach($subcate as $item)
                                        <option value="{{$item->id}}" @if($news->subcate_id == $item->id ) selected @endif >{{$item->title}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                  <div class="col-12 col-md-9">
                                    <select name="subphu_id" id="select" class="form-control subphu" >
                                      <option value="0">--Chọn danh mục--</option>
                                      @foreach($subphu as $item)
                                        <option value="{{$item->id}}" @if($news->subphu_id == $item->id ) selected @endif>{{$item->title}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col col-md-3"><label for="select" class=" form-control-label">Danh mục</label></div>
                                    <div class="col-12 col-md-9">
                                        <img src="img/{{$news->image}}" alt="" width="200px">
                                    </div>
                                </div>
                              <div class="row form-group">
                                
                                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
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
        
     
            <script>
                $(document).ready(function() {
                  $('.summernote').summernote({
                        height: 500,
                        
                  });
                  
                  var markupStr = $('.summernote').val();
            
                  $('.summernote').summernote('code', markupStr);
                });
                $(document).ready(function(){
                  $('#chang_subcate').change(function(){
                    var id = $(this).val() 
                    var token =$("input[name='_token']").val();  
                    $.ajax({
                      url:'ajax/admin/subcate',
                      type:'POST',
                      data:{"_token":token,"id":id},
                      success:function(data)
                      {
                        console.log(data)
                        $('.subphu').html(data);
                      }
                    });
                  });
                });
      
                $(document).ready(function(){
                  $('#chang_cate').change(function(){
                    var id = $(this).val() 
                    var token =$("input[name='_token']").val();  
                    $.ajax({
                      url:'ajax/admin/cates',
                      type:'POST',
                      data:{"_token":token,"id":id},
                      success:function(data)
                      {
                        console.log(data)
                        $('.subcate').html(data);
                      }
                    });
                  });
                });
            </script>
            
            <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
        
      
