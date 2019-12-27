<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Panel</title>
    
    <link rel="icon" href="img/admin.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/objects.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <script src="js/navbar.js"></script>
    <script src="js/ajax.js"></script>

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

    <div class="container my-4">
        <h2 class="mb-4">Articole</h2>

        <form method="post" id="form-create-article">
            @csrf
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Titlu</span>
                </div>
                <input name="title" type="text" id="title" class="form-control" maxlength="255" required>
            </div>
            <div class="input-group mt-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Reteta</span>
                </div>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>
            <div class="d-flex justify-content-center my-3">
                <button class="btn btn-link" type="submit">Salveaza</button>
            </div>
        </form>

        <div id="articles-container">
            @foreach ($articles as $article)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <a class="card-link text-primary font-weight-bold view-article" data-article_id="{{$article->id}}">Vezi articolul</a>
                        @if (!$article->approved)
                            <a class="card-link text-success font-weight-bold approve-article" data-article_id="{{$article->id}}">Aproba</a>
                        @endif
                        <a class="card-link text-danger font-weight-bold delete-article" data-article_id="{{$article->id}}">Sterge</a>
                        <div class="article-content"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script>
        var getContentUrl = "{{route('article.getContent', 'id')}}";
        var destroyArticleUrl = "{{route('article.destroy', 'id')}}";
        var approveArticleUrl = "{{route('article.approve', 'id')}}";
        var createArticleUrl = "{{route('article.createAdmin')}}"
    </script>
</body>
</html>

