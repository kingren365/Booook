<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booook! - 新規登録 -</title>
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
            <h1 class="text-center my-2">Booook!</h1>
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ route('user.register.complete') }}" method="POST" style="width: 100%;">
                @csrf
                <div>
                    <label class="text-primary" for="name">名前</label>
                    <input type="text" name="name" style="width: 100%;" value="{{ old('name') }}">
                </div>
                <div>
                    <label class="text-primary" for="email">メールアドレス</label>
                    <input type="email" name="email" style="width: 100%;" value="{{ old('email') }}">
                </div>
                <div>
                    <label class="text-primary" for="tel">電話番号</label>
                    <input type="tel" name="tel" style="width: 100%;" value="{{ old('tel') }}">
                </div>
                <div>
                    <label class="text-primary" for="adnumber">郵便番号</label>
                    <input type="text" name="adnumber" style="width: 100%;" value="{{ old('adnumber') }}">
                </div>
                <div>
                    <label class="text-primary" for="adress">住所</label>
                    <input type="text" name="adress" style="width: 100%;" value="{{ old('adress') }}">
                </div>
                <div>
                    <label class="text-primary" for="password">パスワード</label>
                    <input type="password" name="password" style="width: 100%;">
                </div>
                <div class="my-3 text-center">
                    <button type="submit" class="btn btn-primary">新規登録</button>
                </div>
                <div class="my-3 text-center">
                    <a href="{{ route('user.login.form') }}"><button type="button" class="btn btn-secondary">戻る</button></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

