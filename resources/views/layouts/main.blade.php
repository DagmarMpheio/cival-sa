<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Cival SA - Blog</title>

    {{--<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>--}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!--Icone do site-->
    <link rel="icon" href="{{asset('img/icone.png')}}">
    <!--fontawesome-->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/v4-shims.min.css')}}">{{--redes sociais--}}

</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#the-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Cival</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="the-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{route('blog')}}"><i class="fa fa-blog"></i> Blog</a></li>
                    <li><a href="#"><i class="fa fa-info"></i> Sobre</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> Contacte-nos</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="copyright">&copy; 2023 Dagmar Mpheio</p>
            </div>
            <div class="col-md-4">
                <nav>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i>&nbsp;</a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i>&nbsp;</a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i>&nbsp;</a></li>
                        <li><a href="#"><i class="fa fa-github"></i>&nbsp;</a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i>&nbsp;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>