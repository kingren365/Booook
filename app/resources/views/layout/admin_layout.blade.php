<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booook!ADMIN @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        .wrap{
            width:90%;
            margin:0 auto;
        }

        li {
            list-style: none;
        }

        a {
            color: #000000;
            text-decoration: none;
        }

        header {
            height: 80px;
        }

        ul {
            padding: 0;
            margin: 0;
        }

        li{
            display: block;
            padding: 10px auto;
        }

        h1 a {
            text-decoration: none;
        }

        h1 a:hover {
            color: #000000;
        }
        @yield('style')
    </style>
</head>
<body>
    <header class="d-flex justify-content-between bg-light">
        <div class="d-flex justify-content-center align-items-center col-4">
            <h1><a href="{{ route('admin.home') }}">Booook!ADMIN</a></h1>
        </div>
        <ul class="d-flex justify-content-around align-items-center col-4">
            @if (url()->full() == route('admin.account'))
                <li><a href="{{ route('admin.logout') }}"><button class="btn btn-danger">ログアウト</button></a></li>
            @else
                <li><a href="{{ route('admin.account') }}">アカウント情報</a></li>
            @endif
            @if (url()->full() != route('admin.home'))
                <li><a href="{{ route('admin.home') }}"><button class="btn btn-primary">管理者トップへ戻る</button></a></li>
            @endif
        </ul>
    </header>
    <div class="wrap">
        @yield('section')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        @yield('js')
    </script>
</body>
</html>
