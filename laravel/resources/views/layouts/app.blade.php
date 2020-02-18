<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kanban</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @auth
        <header class="header">
            <nav class="nav">
                <ul class="header_menu">
                    <li class="nav-link">{{ Auth::user()->name }}さん</li>
                    <li class="header_menu_title">
                        <a class="nav-link listNew" href="/">kanban</a>
                    </li>
                    <li>
                        <ul class="header_menu_inner">
                            <li>
                                <a class="nav-link listNew" href="{{ route('new') }}">リスト作成</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
    @endauth
    
    @yield('content')

</body>
</html>
