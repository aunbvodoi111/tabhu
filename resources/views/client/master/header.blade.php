<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <base href="{{ asset('')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<header>
    <div class="img-top container">
        <img src="http://thuthuatphanmem.vn/images/logo.png" alt="">
    </div>
    <div class="menu container-fruid">
        <div class="container">
            <ul>
                <li><a href="/"><i class="fas fa-home logo-icon"></i></a></li>
                <!-- <li><a href="/"><i class="fab fa-windows logo-icon"></i>Phần mềm <i class="fas fa-caret-down multipe-menu"></i></a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Internet</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Đồ họa</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động <i class="fas fa-caret-down multipe-menu"></i></a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li> -->
                @foreach($cate as $item)
                    <li><a href="{{Str_slug($item->title)}}-z{{$item->id}}"><i class="fab fa-windows logo-icon"></i>{{$item->title}} <i class="fas fa-caret-down multipe-menu"></i></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</header>