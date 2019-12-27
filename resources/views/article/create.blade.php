<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" href="img/writing.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/objects.css">

    <script src="js/navbar.js"></script>

    <title>Contribuie</title>
</head>
<body>

    <ul class="topnav">
        <li><a href="{{route('home')}}"><img src="img/icon_white.png" class="navbar-img" alt="Icon"></a></li>
        <li class="right open-navbar" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</li>
    </ul>

    <nav id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{route('home')}}">Acasa</a>
        <a href="{{route('article.create')}}">Contribuie</a>
        @if (Auth::check())
            <a href="{{route('article.index')}}">Admin</a>
        @endif
        @if (Auth::check())
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Iesire') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{route('login')}}">Conectare</a>
        @endif
    </nav>

    <div class="container mt-5">
        
        @if(session()->has('message'))
            <div class="alert alert-success my-2">
                {{ session()->get('message') }}
            </div>
        @endif

        <h2>Scrie articolul tau</h2>

        <form method="post">
            @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Titlu</span>
                </div>
                <input name="title" class="form-control" aria-label="With textarea" maxlength="255" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Reteta</span>
                </div>
                <textarea name="content" class="form-control" aria-label="With textarea" rows="10" required></textarea>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button class="btn btn-link" type="submit">Trimite</button>
            </div>
        </form>
    </div>
</body>
</html>