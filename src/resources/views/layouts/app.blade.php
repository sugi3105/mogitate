<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'もぎたて')</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="header">
        <div class="header-inner">
            <h1 class="logo">もぎたて</h1>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

</body>
</html>