<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        .list {
            display: flex;
            gap: 10px;
            list-style-type: none;
        }
        a {
            color: white;
            text-decoration: none;
            background-color: red;
            padding: 0.2rem 1rem;
            border-radius: 10px;
        }
        .actived a {
            background-color: black;
            color: white;    
        }
    </style>
</head>
<body>
    {{-- {{request()->routeIs('about')?'active':''}} --}}
    @include('partials/nav')
    @include('partials.session-status')
    @yield('content')
</body>
</html>