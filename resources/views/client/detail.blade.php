@extends('client.master.index')
@section('content')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script> 

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />

    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js-->

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<section>
    <div class='container'>
        @include('client.master.search')
        <div class="content">
            <div class="container include">
                <div class="row">
                    <div class="content-main col-sm-9">
                        <div class="main-breadcum container">
                             <a href="/">Trang chủ</a>›
                             <a href="{{Str_slug($data->subphu->subcate->title)}}/{{Str_slug($data->subphu->title)}}-z{{$data->subphu->id}}">{{ $data->subphu->subcate->title }}</a>›
                             <a href="{{Str_slug($data->subphu->subcate->title)}}/{{Str_slug($data->subphu->title)}}-z{{$data->subphu->id}}">{{ $data->subphu->title }}</a>
                        </div>
                        <div class="title-ar-d container">
                            <h1>{{ $data->title }}</h1>
                        </div>
                        <div class="post-meta ">
                            <i class="far fa-user"></i> {{ $data->user->name }}
                            <i class="far fa-clock"></i> {{ $data->created_at->diffForHumans() }}
                        </div>
                        <div class="detail">
                            <p>{!! $data->description !!}</p>
                        </div>
                        <div class="ar-relate">
                            <h2>Bài viết liên quan</h2>
                            <div class="row">
                                @foreach($lienquan as $item)
                                    <div class="news-relative col-sm-4">
                                        <div class="row">
                                            <div class="col-4 col-lg-12">
                                                <a href="{{Str_slug($item->title)}}-t{{$item->id}}">
                                                    <img src="img/{{$item->image}}" alt="{{$item->title}}" width="100%">
                                                </a>
                                            </div>
                                            <div class="col-8 col-lg-12">
                                                <a href="{{Str_slug($item->title)}}-t{{$item->id}}">{{$item->title}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div>
                                <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div>
                                <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div>
                                <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div>
                                <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="content-right col-sm-3">
                        <div class="title-right">
                            <span>Tin tức khác</span>
                        </div>
                        @foreach($lienquan as $item)
                            <div class="ar-right row">
                                <div class='img-r col-sm-3'>
                                    <img src="img/{{$item->image}}" alt="{{$item->title}}"width="100%" >
                                </div>
                                <div class='img-r col-sm-9'>
                                    <a href="{{Str_slug($item->title)}}-t{{$item->id}}">{{$item->title}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
