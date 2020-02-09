@extends('client.master.index')
@section('content')
    <div class="container notfound">
        <h2>Không tìm thấy đường dẫn này</h2>
        <p>Bạn có thể truy cập vào <a href="/">trang chủ</a> hoặc sử dụng ô dưới đây để tìm kiếm</p>
        @include('client.master.search')
    </div>
@endsection