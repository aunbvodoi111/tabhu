<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <base href="{{ asset('')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/png" href="img/favicon.png">
    @if(isset($data))
        <title>{{$data->title}} - Tabhuman </title>
        <link rel="canonical" href="{{\Request::fullUrl()}}" />
        <meta name="author" content="tabhuman.com" />
        <link rel="icon" type="image/png" href="img/favi.png">
        @if($data->keyword)
            <meta name="description" content="{{$data->keyword}}" />
        @else
            <meta name="description" content="{{$data->title}}" />
        @endif
        
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content=" {{$data->title}} - QuynhPhuongbaby " />
        <link rel='shortlink' href='https://tabhuman.com/' />
        @if($data->keyword)
            <meta property="og:description" content="{{$data->keyword}}" />
        @else
            <meta property="og:description" content="{{$data->title}}" />
        @endif
        
        <meta property="og:image" content="{{$data->image}}" />
        <meta property="og:url" content="{{\Request::fullUrl()}}" />
        <meta property="og:site_name" content="Ngam gai Sexy" />
        <meta property="twitter:title" content="{{$data->title}} - Tabhuman" />
        @if($data->keyword)
            <meta property="twitter:description" content="{{$data->keyword}}" />
        @else
            <meta property="twitter:description" content="{{$data->title}}  " />
        @endif
        <meta property="twitter:image" content="{{$data->image}}" />
        <meta property="article:tag" content="{{$data->title}}" />
        <meta content="INDEX,FOLLOW" name="robots" />
        <meta name="copyright" content="Copyright 2018 Tabhuman" />
        <meta http-equiv="audience" content="General" />
        <meta name="resource-type" content="Document" />
        <meta name="distribution" content="Global" />
        <meta name="revisit-after" content="1 days" />
        <meta name="GENERATOR" content="Web Tabhuman số 1 Việt Nam" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script type="application/ld+json">
            {
                "@context":"http://schema.org",
                "@type":"BreadcrumbList",
                "itemListElement":[
                    {
                        "@type":"ListItem",
                        "position":1,
                        "item":{
                            "@id":"https://tabhuman.com/{{Str_slug($data->title) }}",
                            "name":"{{$data->title}}"
                        }
                    }
                ]
            }
        </script>
        <script type="application/ld+json">
            {
                "@context":"http://schema.org",
                "@type":"NewsArticle",
                "mainEntityOfPage":{
                    "@type":"WebPage",
                    "@id":"{{\Request::fullUrl()}}"
                },
                "headline":"{{$data->title}}",
                "description":"{{$data->title}} - QuynhPhuongbaby",
                "image":{
                    "@type":"ImageObject",
                    "url":"{{$data->image}}"
                },
                "datePublished":"{{$data->created_at}}",
                "dateModified":"{{$data->updated_at}}",
                "author":{
                    "@type":"Person",
                    "name":"QuynhPhuongbaby"
                },
                "publisher":{
                    "@type": "Organization",
                    "name":"QuynhPhuongbaby",
                    "logo":{
                        "@type":"ImageObject",
                        "url":"https://tabhuman.com/img/proxy_form.png"
                    }
                }
            }
        </script>
    @else
        <title>Tabhuman.com - Web tin tức, giải trí ,kiến thức, thủ thuật </title>
        <link rel="canonical" href="https://tabhuman.com/" />
        <meta name="author" content="ngamgaisexy.com" />
        <link rel="icon" type="image/png" href="img/favi.png">
        <meta name="description" content="Hệ thống cửa hàng Mẹ và Bé BiboMart chuyên cung cấp đồ sơ sinh, đồ chơi, xe đẩy, giường cũi, sản phẩm dành cho mẹ bé giá tốt và chia sẻ những kiến thức hữu ích nhất." />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="QuynhPhuongbaby.com - Hệ thống cửa hàng Mẹ và bé số 1 Việt Nam " />
        <link rel='shortlink' href='https://tabhuman.com/' />
        <meta property="og:description" content="Hệ thống cửa hàng Mẹ và Bé BiboMart chuyên cung cấp đồ sơ sinh, đồ chơi, xe đẩy, giường cũi, sản phẩm dành cho mẹ bé giá tốt và chia sẻ những kiến thức hữu ích nhất." />
        <meta property="og:url" content="https://tabhuman.com/" />
        <meta property="og:site_name" content="Ngam gai Sexy" />
        <meta property="twitter:title" content="QuynhPhuongbaby.com - Hệ thống cửa hàng Mẹ và bé số 1 Việt Nam" />
        <meta property="twitter:description" content="Hệ thống cửa hàng Mẹ và Bé BiboMart chuyên cung cấp đồ sơ sinh, đồ chơi, xe đẩy, giường cũi, sản phẩm dành cho mẹ bé giá tốt và chia sẻ những kiến thức hữu ích nhất." />
        <meta content="INDEX,FOLLOW" name="robots" />
        <meta property="twitter:title" content="QuynhPhuongbaby.com - Hệ thống cửa hàng Mẹ và bé số 1 Việt Nam" />
        <meta property="twitter:description" content="Hệ thống cửa hàng Mẹ và Bé BiboMart chuyên cung cấp đồ sơ sinh, đồ chơi, xe đẩy, giường cũi, sản phẩm dành cho mẹ bé giá tốt và chia sẻ những kiến thức hữu ích nhất." />
        <meta property="article:tag" content="QuynhPhuongbaby" />
        <meta name="copyright" content="Copyright 2018 QuynhPhuongbaby" />
        <meta http-equiv="audience" content="General" />
        <meta name="resource-type" content="Document" />
        <meta name="distribution" content="Global" />
        <meta name="revisit-after" content="1 days" />
        <meta name="GENERATOR" content="Web QuynhPhuongbaby số 1 Việt Nam" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <script type="application/ld+json">
            {
                "@context" : "http://schema.org",
                "@type" : "WebSite",
                "name" : "Ngamgaisexy",
                "alternateName" : "Hệ thống cửa hàng Mẹ và Bé BiboMart chuyên cung cấp đồ sơ sinh, đồ chơi, xe đẩy, giường cũi, sản phẩm dành cho mẹ bé giá tốt và chia sẻ những kiến thức hữu ích nhất.",
                "url": "{{\Request::fullUrl()}}",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://tabhuman.com/?search={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }
        </script>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "Website",
                "name": "Ngamgaisexy",
                "url": "{{\Request::fullUrl()}}",
                "logo": "https://tabhuman.com/img/proxy_form.png",
                "foundingDate": "2018",
                "founders": [
                    {
                        "@type": "Person",
                        "name": "QuynhPhuongbaby"
                    }
                ]
            }
        </script>
    @endif
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script>
    $(document).ready(function(){
        $(".po").hover(function(){
            $(this).find(".ab").toggle()
        })
        $(".show-desk").click(function(){
            $('.po').toggle(100)
        })
        var scrollTop = $("#scrollTop"); 

        $(window).scroll(function() {
            var topPos = $(this).scrollTop();
            if (topPos > 100) {
                $(scrollTop).css("opacity", "1");

            } else {
                $(scrollTop).css("opacity", "0");
            }

            }); 

            $(scrollTop).click(function() {
            
            $('html, body').animate({
                scrollTop: 0
            }, 600);
                return false;
        });
    })
  </script>
</head>
<body>
<header>
    <div class="img-top container">
        <a href="/"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="menu container-fruid">
        <div class="container ta">
            <ul>
                <li><a href="/" class="hide-desk"><i class="fas fa-home logo-icon "></i></a> <a href="javascript:void(0)" class="show-desk"><i class="fas fa-bars logo-icon "></i></a></li> 
                <!-- <li><a href="/"><i class="fab fa-windows logo-icon"></i>Phần mềm <i class="fas fa-caret-down multipe-menu"></i></a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Internet</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Đồ họa</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động <i class="fas fa-caret-down multipe-menu"></i></a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li>
                <li><a href="/"><i class="fab fa-windows logo-icon"></i>Di động</a></li> -->
                @foreach($cate as $item)
                    <li class='po'>
                        <a href="{{Str_slug($item->title)}}-z{{$item->id}}"><i class="fab fa-windows logo-icon"></i>{{$item->title}} @if(count($item->subcates) > 0) <i class="fas fa-caret-down multipe-menu"></i> @endif</a>
                        @if(count($item->subcates) > 0)
                            <ul class='ab'>
                                @foreach($item->subcates as $row)
                                    <li>
                                        <a href="{{Str_slug($item->title)}}/{{Str_slug($row->title)}}-z{{$row->id}}"><i class="fab fa-windows logo-icon"></i>{{$row->title}}</a>
                                    </li>
                                    <li>
                                        <a href="{{Str_slug($item->title)}}/{{Str_slug($row->title)}}-z{{$row->id}}"><i class="fab fa-windows logo-icon"></i>{{$row->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>