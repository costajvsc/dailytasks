<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dailytasks - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">
    <script src="https://kit.fontawesome.com/d5e0d5b45e.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container">@yield('content')</main>
</body>
<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>
@yield('scripts')
</html>
