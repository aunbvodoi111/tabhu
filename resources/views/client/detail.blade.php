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
                             <a href="">Trang chủ</a>›
                             <a href="">Đồ họa</a>›
                             <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                        </div>
                        <div class="title-ar-d container">
                            <h1>Hướng dẫn cách khử Noise trong Photoshop</h1>
                        </div>
                        <div class="post-meta container">
                            <i class="far fa-user"></i> {{ $news->user->name }}
                            <i class="far fa-clock"></i> {{ $news->created_at->diffForHumans() }}
                        </div>
                        <div class="detail">
                            <p>{!! $news->description !!}</p>
                        </div>
                        <div class="ar-relate">
                            <h2>Bài viết liên quan</h2>
                            <div class="row">
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
                                </div>
                                <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div>
                                <div class="news-relative col-sm-4">
                                    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/10/25/cach-tao-khung-vien-bang-photoshop_102200467.jpg" alt="" width="100%">
                                    <a href="">Hướng dẫn cách khử Noise trong Photoshop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-right col-sm-3">
                        <div class="title-right">
                            <span>Tin tức khác</span>
                        </div>
                        <div class="ar-right row">
                            <div class='img-r col-sm-3'>
                                <img src="http://thuthuatphanmem.vn/uploads/2015/05/19/word_090703.png" alt=""width="100%" >
                            </div>
                            <div class='img-r col-sm-9'>
                                <a href="">Cách đánh số trang trong word (từ đầu hoặc trang bất kỳ)</a>
                            </div>
                        </div>
                        <div class="ar-right row">
                            <div class='img-r col-sm-3'>
                                <img src="http://thuthuatphanmem.vn/uploads/2015/05/19/word_090703.png" alt=""width="100%" >
                            </div>
                            <div class='img-r col-sm-9'>
                                <a href="">Cách đánh số trang trong word (từ đầu hoặc trang bất kỳ)</a>
                            </div>
                        </div>
                        <div class="ar-right row">
                            <div class='img-r col-sm-3'>
                                <img src="http://thuthuatphanmem.vn/uploads/2015/05/19/word_090703.png" alt=""width="100%" >
                            </div>
                            <div class='img-r col-sm-9'>
                                <a href="">Cách đánh số trang trong word (từ đầu hoặc trang bất kỳ)</a>
                            </div>
                        </div>
                        <div class="ar-right row">
                            <div class='img-r col-sm-3'>
                                <img src="http://thuthuatphanmem.vn/uploads/2015/05/19/word_090703.png" alt=""width="100%" >
                            </div>
                            <div class='img-r col-sm-9'>
                                <a href="">Cách đánh số trang trong word (từ đầu hoặc trang bất kỳ)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
