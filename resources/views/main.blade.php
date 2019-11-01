<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/solid.css')}}">
    <link rel="stylesheet" href="{{asset('css/mystyle.css')}}">
    <title>{{env('APP_NAME')}}</title>
</head>
<body>

    @include('nav')

    <div class="container content">
        @yield('content')
    </div>

    <footer class="py-2 bg-white text-gray">
        Copyright &copy; 2019. Benjie B. Lenteria <br>
        All rights reserved.
    </footer>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('scripts')
</body>
</html>
