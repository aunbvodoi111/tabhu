@extends('client.master.index')
@section('content')
<section>
    <div class='container'>
        @include('client.master.search')
        <div class="content">
            <div class="container include">
                <div class="row">
                    <div class="content-main col-sm-9">
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
                                                <img src="img/{{$item->image}}" alt="{{$item->title}}" width="100%" height="178px">
                                            </a>
                                        </div>
                                        <div class="col-sm-7">
                                            <p>{{$item->short_title}}</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

