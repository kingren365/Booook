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
        @yield('style')
    </style>
</head>
<body>
    <header class="d-flex justify-content-between bg-light">
        <div class="d-flex justify-content-center align-items-center col-4">
            <h1>Booook!</h1>   
        </div> 
        <div class="d-flex justify-content-center align-items-center col-4 text-center">
            <form class="search col-12">
                <input type="text" name="search_word" class="d-inline-block w-50 p-1">
                <button class="btn btn-secondary">検索</button>
                <div>
                    <select name="price_min" id="price_min">
                        <option value="">1000</option>
                        <option value="">1000</option>
                        <option value="">1000</option>
                    </select>
                    <span>円 </span>
                    <span>  ~  </span>
                    <select name="price_max" id="price_max">
                        <option value="">1000</option>
                        <option value="">1000</option>
                        <option value="">1000</option>
                    </select>
                    <span>円</span>
                </div>
            </form>    
        </div>
        <ul class="d-flex justify-content-around align-items-center col-4">
            @if (session()->has('user_id') && session()->has('name') && session()->has('email')) 
                <li><a href="">アカウント情報</a></li>
            @else
                <li><a href="{{ route('user.login.form') }}"><button class="btn btn-danger">ログイン</button></a></li>
            @endif
            <li><a href=""><button class="btn btn-primary">ショッピングカート</button></a></li>
        </ul>
    </header>
    <div class="wrap">
        @yield('section')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        @yield('js')
    </script>
</body>
</html>