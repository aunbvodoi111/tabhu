@extends('client.master.index')
@section('content')
<section>
    <div class='container'>
        @include('client.master.search')
        <div class="content">
            <div class="container include">
                <div class="row">
                    <div class="content-main col-sm-8">
                        @foreach($news as $item)
                            <div class="col-sm-12 news">
                                <article>
                                    <h2><a href="{{Str_slug($item->title)}}-t{{$item->id}}">{{ $item->title }}</a></h2> 
                                    <div class="infor-ar">
                                        <i class="far fa-user"></i> {{ $item->user->name }}
                                        <i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }}
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5 img-ar">
                                            <a href="{{Str_slug($item->title)}}-t{{$item->id}}">
                                                <img src="img/{{$item->image}}" alt="" width="100%" >
                                            </a>
                                        </div>
                                        <div class="col-sm-7">
                                            <p>{{$item->short_title}}</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <!-- <div class="col-sm-12 news">
                            <article>
                                <h2><a href="">Những bài thơ về hoa sen hay nhất</a></h2>
                                <div class="infor-ar">
                                    <i class="far fa-user"></i> Phạm Qúy
                                    <i class="far fa-clock"></i> February 1, 2020
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 img-ar">
                                        <img src="https://img4.thuthuatphanmem.vn/uploads/2020/01/21/nhung-bai-tho-ve-hoa-sen-hay-nhat_032103346.jpg" alt="" width="100%">
                                    </div>
                                    <div class="col-sm-7">
                                        <p>Hoa sen, một loài hoa không chỉ được mệnh danh là linh hồn của dân tộc mà còn là biểu tượng của Phật.</p>
                                    </div>
                                </div>
                            </article>
                        </div> -->
                    </div>
                    <div class="content-right col-sm-4">
                        <div class="title-right">
                            <span>Tin tức khác</span>
                        </div>
                        @foreach($news as $item)
                            <div class="ar-right row">
                                <div class='img-r col-sm-3'>
                                    <a href="{{Str_slug($item->title)}}-t{{$item->id}}">
                                        <img src="img/{{$item->image}}" alt=""width="100%" >
                                    </a>
                                </div>
                                <div class='img-r col-sm-9'>
                                    <a href="{{Str_slug($item->title)}}-t{{$item->id}}">{{$item->short_title}}</a>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="ar-right row">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

