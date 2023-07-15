<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booook! - パスワード変更画面 -</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            width: 100%;
            height: 100vh;
        }
        .flexbox-container-vertical-center {
            display: flex; /* 子要素をflexboxで揃える */
            flex-direction: column; /* 子要素をflexboxにより縦方向に揃える */
            justify-content: center; /* 子要素をflexboxにより中央に配置する */
            align-items: center;  /* 子要素をflexboxにより中央に配置する */
            width: 100%; /* 見た目用 */
            height: 100%; /* 見た目用 */
        }
    </style>
</head>
<body>
    <div class="flexbox-container-vertical-center">
        <div>
            <h1 class="text-center my-5"><a style="text-decoration: none;color: #000000;" href="{{ route('user.home') }}">Booook!</a></h1>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="text-center">パスワード変更</h2>
            <form action="{{ route('user.password.reset.complete') }}" method="POST" style="width: 100%;">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div>
                    <label for="password" class="text-primary">パスワード</label>
                    <input type="password" name="password" style="width: 100%;">
                </div>
                <div>
                    <label for="password" class="text-primary">パスワード再確認</label>
                    <input type="password" name="password_confirmation" style="width: 100%;">
                </div>
                <div class="my-3 text-center">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.login.form') }}"><button type="button" class="btn btn-secondary">戻る</button></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

