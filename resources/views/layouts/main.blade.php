<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="{{asset('/public/css/app.css')}}"" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/Template/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="/public/Template/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/{{ $connect }}/my.css" />

    <link rel="stylesheet" type="text/css" href="/public/Template/css/jquery.rateit.css" />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" />
    <script type="text/javascript" src="/public/js/all.js"></script>
    <script type="text/javascript" src="/public/js/{{ $connect }}/main_functions.js"></script>
    <script type="text/javascript" src="/public/js/{{ $connect }}/main.js"></script>

    <script>

        <?php  if($connect=='directory'){
            echo 'thisPage="'.$page.'"; ';
            echo    'thisCountry="'.$country.'"; ';
            echo    'thisRate="'.$rate.'"; ';
        }?>

    </script>

</head>
<body>
<div id="mask"></div>

    @section('header')
    <div id="header"><div class="inner"><div class="padder">
                <div class="lSide">
                    <a href="/" class="logo">Sites Reviews</a>
                    <a href="#" class="trigger"><!--//--></a>
                    <div class="clear"><!--//--></div>
                </div>
                <div class="rSide">
                    <ul class="menu">
                        <li><a href="/directory">Directory</a></li>
                        <li><a href="/index.php/featured">Featured</a></li>
                        <li><a href="/index.php/blog">Blog</a></li>
                        <li><a href="/index.php/about">About</a></li>
                    </ul>
                </div>
                <div class="clear"><!--//--></div>
            </div></div></div>
    @show
    <div id="container">
        @yield('content')

        @section('footer')
    <div id="footer"><div class="inner">
            <p>All Rights Reserved<br />Customer service is excellent. Very professional.</p>
        </div></div>
        @show
</div>
</body>
</html>