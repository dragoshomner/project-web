<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="img/icon.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/objects.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/navbar.js"></script>
    <script src="js/home.js"></script>

    <title>Bucataria moderna</title>
</head>
<body>

    <ul class="topnav">
        <li><a href="{{route('home')}}"><img src="img/icon_white.png" alt="Icon" class="navbar-img"></a></li>
        <li class="right open-navbar" onclick="openNav()">&#9776;</li>
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

    <section>
        <div class="container-fluid bg-poster">
            <div class="row py-4">
                <div class="col-sm-6">
                    <div class="w-100 d-flex justify-content-center">
                        <img class="img-fluid" src="img/poster-image.png" alt="Bucatarul fericit">
                    </div>
                </div>
                <div class="col-sm-6 align-self-center">
                    <p class="poster-text-title">Gatim cu dragoste</p>
                    <p class="poster-text-description">De peste 20 de ani aducem bucurie in casele si bucatariile oamenilor. 
                        <strong>Mancarea uneste familii!</strong>
                    </p>
                    <a href="{{route('article.create')}}" class="btn btn-link">Scrie tu!</a>
                </div>
            </div>
        </div>

        <div class="bg-infos">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 my-4">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid w-25" src="img/reading.png" alt="Read">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <h3>Citeste</h3>
                        </div>
                    </div>
                    <div class="col-sm-4 my-4">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid w-25" src="img/cooking.png" alt="Read">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <h3>Gateste</h3>
                        </div>
                    </div>
                    <div class="col-sm-4 my-4">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid w-25" src="img/writing.png" alt="Read">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <h3>Contribuie</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <article>
        <div class="bg-articles" id="articles">
            <div class="container py-3">
                <header>
                    <h2>Articole</h2>
                </header>
                @foreach ($articles as $article)
                    <div class="card bg-poster my-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$article->title}}</h5>
                            <pre class="card-text">{{$article->content}}</pre>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </article>
</body>
</html>