<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booook! @yield('title')</title>
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
            <h1><a href="{{ route('user.home') }}">Booook!</a></h1>
        </div>
        @if (url()->full() != route('user.account') && url()->full() != route('user.account.edit') && url()->full() != route('user.history') && url()->current() != route('user.review.create') && url()->full() != route('user.cart.view'))
            <div class="d-flex justify-content-center align-items-center col-4 text-center">
                <form class="search col-12" action="{{ route('user.home') }}" method="GET">
                    <input type="text" name="search_word" class="d-inline-block w-50 p-1 m-2" value="{{ $searchWord }}">
                    <button class="btn btn-secondary">検索</button>
                    <div>
                        <select name="price_min" id="price_min">
                            <option value="0" @if($priceMin == 0) selected @endif>最小金額を選択</option>
                            <option value="1000" @if($priceMin == 1000) selected @endif>1000</option>
                            <option value="2000" @if($priceMin == 2000) selected @endif>2000</option>
                            <option value="3000" @if($priceMin == 3000) selected @endif>3000</option>
                            <option value="4000" @if($priceMin == 4000) selected @endif>4000</option>
                            <option value="5000" @if($priceMin == 5000) selected @endif>5000</option>
                        </select>
                        <span>円 </span>
                        <span>  ~  </span>
                        <select name="price_max" id="price_max">
                            <option value="100000" @if($priceMax == 100000) selected @endif>最大金額を選択</option>
                            <option value="2000" @if($priceMax == 2000) selected @endif>2000</option>
                            <option value="3000" @if($priceMax == 3000) selected @endif>3000</option>
                            <option value="4000" @if($priceMax == 4000) selected @endif>4000</option>
                            <option value="5000" @if($priceMax == 5000) selected @endif>5000</option>
                            <option value="6000" @if($priceMax == 6000) selected @endif>6000</option>
                            <option value="7000" @if($priceMax == 7000) selected @endif>7000</option>
                            <option value="8000" @if($priceMax == 8000) selected @endif>8000</option>
                            <option value="9000" @if($priceMax == 9000) selected @endif>9000</option>
                            <option value="10000" @if($priceMax == 10000) selected @endif>10000</option>
                        </select>
                        <span>円</span>
                    </div>
                </form>
            </div>
        @endif
        <ul class="d-flex justify-content-around align-items-center col-4">
            @if (session()->has('user_id') && session()->has('name') && session()->has('email'))
                @if (url()->full() == route('user.account') || url()->full() == route('user.account.edit'))
                    <li><a href="{{ route('user.history') }}"><button class="btn btn-primary">購入履歴</button></a></li>
                    <li><a href="{{ route('user.logout') }}"><button class="btn btn-danger">ログアウト</button></a></li>
                @else
                    <li><a href="{{ route('user.account') }}">アカウント情報</a></li>
                    <li><a href="{{ route('user.cart.view') }}"><button class="btn btn-primary">ショッピングカート</button></a></li>
                @endif
            @else
                <li><a href="{{ route('user.login.form') }}"><button class="btn btn-danger">ログイン</button></a></li>
                <li><a href="{{ route('user.cart.view') }}"><button class="btn btn-primary">ショッピングカート</button></a></li>
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
