<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core Css -->
    @section('css')
        {{ Html::style('plugins/bootstrap/css/bootstrap.css') }}
        {{ Html::style('plugins/node-waves/waves.css') }}
        {{ Html::style('plugins/animate-css/animate.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/themes/all-themes.css') }}
        {{ Html::style('css/custom.css') }}
         <!-- Google Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    @show

    @yield('extra-css')
</head>

<body class="theme-green">
    @include('layouts.partials.sidebar')

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
        
    </section>

    @section('script')
        {{Html::script('plugins/jquery/jquery.min.js')}}
        {{Html::script('plugins/bootstrap/js/bootstrap.js')}}
        {{Html::script('plugins/bootstrap-select/js/bootstrap-select.js')}}
        {{Html::script('plugins/node-waves/waves.js')}}

    @show    
    @yield('extra-script')
</body>

</html>