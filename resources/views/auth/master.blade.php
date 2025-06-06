<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>پنل مدیریت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" type="image/x-icon" href="{{url('panel/images/favicon.png')}}"/>
    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/perfect-scrollbar.min.css')}}"/>
    {{--    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/style.css')}}" />--}}
    {{--    @vite('resources/css/app.css')--}}
    <link rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/style.css')}}"
    <link rel="stylesheet" href="{{url('tailwind/assets/app-CA3lr28Z.css')}}">

    <link defer rel="stylesheet" type="text/css" media="screen" href="{{url('panel/css/animate.css')}}"/>
    <script src="{{url('panel/js/perfect-scrollbar.min.js')}}"></script>
    <script defer src="{{url('panel/js/popper.min.js')}}"></script>
    <script defer src="{{url('panel/js/tippy-bundle.umd.min.js')}}"></script>
    <script defer src="{{url('panel/js/sweetalert.min.js')}}"></script>
</head>

<body
    x-data="main"
    class="relative overflow-x-hidden text-sm antialiased font-normal"
    :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout,$store.app.rtlClass]"
>

@yield('content')

</body>
</html>

