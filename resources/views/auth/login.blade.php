<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" href="img/icon.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/objects.css">
   
    <script src="js/navbar.js"></script>

    <title>Conectare</title>
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
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row justify-content-center">

                        <div class="col-sm-6">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Email</span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">

                        <div class="col-sm-6">
                            <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Parola</span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <div class="col-md-6 d-flex justify-content-center">
                            <button type="submit" class="btn btn-link">
                                {{ __('Conectare') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
