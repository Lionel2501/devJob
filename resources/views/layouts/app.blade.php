<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    @yield('styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
    <div id="app">
        <nav class="bg-gray-800 shadow-md py-4">
            <div class="container mx-auto md:px-0">
                <div class="flex items-center justify-around">
                    <a class="text-2xl text-white" href="{{ url('/') }}">
                        {{ config('app.name', 'Welcome to Dev Jobs') }}
                    </a>

                    <div class="flex-1 text-right">
                        @guest
                            @if (Route::has('login'))
                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="text-white no-underline hover:underline hover:text-gray-300 p-3"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>
                            <a href="{{route('notificaciones')}}"
                                class="bg-red-500 text-sm rounded-full text-white px-2 py-1">
                                {{Auth::user()->unreadNotifications->count()}}</a>
                            <div class="no-underline hover:underline text-gray-300 text-sm p-3" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        @if(session('estado'))
            <div class="text-center bg-green-300 text-white p-8 font-bold">
                {{session('estado')}}
            </div>
        @endif
        <div class="bg-gray-600">
            <nav class="container mx-auto flex flex-col text-center md:flex-row space-x-1">
                @yield('navegacion')
            </nav>
        </div>
        <main class="mt-10 container mx-auto">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
