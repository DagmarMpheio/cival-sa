<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="Dashboard">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/img/logo-cival.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>{{ config('app.name', 'Laravel') }} -  @yield('title')</title>

    <link href="/backend/css/app.css" rel="stylesheet">
    {{-- custom css --}}
    <link href="/backend/css/custom.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    {{-- bootstrap css --}}
    {{-- <link rel="stylesheet" href="/backend/css/bootstrap/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="/backend/css/bootstrap/css/bootstrap.min.css"> --}}
    <!-- bootstrap wysihtml5 - text editor -->
    {{-- <link rel="stylesheet" href="/backend/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> --}}
    {{-- estilo para markdown --}}
    <link rel="stylesheet" href="/backend/plugins/simplemde/simplemde.min.css">
    {{-- bootstrap-datetimepicker css --}}
    <link rel="stylesheet" href="/backend/css/bootstrap-datetimepicker.min.css">
    {{-- jasny-boostrap --}}
    <link rel="stylesheet" href="/backend/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css">
    @yield('style')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>-->
    <script src="/backend/js/html5shiv.min.js"></script>
    <script src="/backend/js/respond.min.js"></script>
</head>

<body>
    <div class="wrapper">
        @include('layouts.backend.sidebar')

        <div class="main">
            @include('layouts.backend.navbar')

            <main class="content">
                {{--conteudo da pagina--}}
                @yield('content')
                
            </main>

            @include('layouts.backend.footer')
        </div>
    </div>

   

    <!-- jQuery 2.2.3 -->
    <script src="/backend/js/jquery-2.2.3.min.js"></script>
    <script src="/backend/plugins/simplemde/simplemde.min.js"></script>
    {{-- moment js --}}
    <script src="/backend/js/moment-with-locales.min.js"></script>
    {{-- bootstrap timepicker --}}
    <script src="/backend/js/bootstrap-datetimepicker.min.js"></script>
    {{-- jasny-bootstrap --}}
    <script src="/backend/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>

    <script src="/backend/js/app.js"></script>
    
    @yield('scripts')

</body>

</html>
