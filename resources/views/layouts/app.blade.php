<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'お問い合わせフォーム')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
        <!-- ナビゲーションバー -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('contact.form') }}">お問合わせフォーム</a>

                <!-- 折りたたみボタン（画面が小さくなったときに表示） -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- ログイン・ログアウトボタンの表示 -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <!-- ログインしている場合 -->
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">ログアウト</button>
                                </form>
                            </li>
                        @else
                            <!-- ログインしていない場合 -->
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('login') }}">ログイン</a>
                            </li>
                            <li class="nav-item ms-2">
                                <a class="btn btn-success" href="{{ route('register') }}">サインアップ</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- ページのメインコンテンツ -->
        <main class="container py-4">
            @yield('content')
        </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
