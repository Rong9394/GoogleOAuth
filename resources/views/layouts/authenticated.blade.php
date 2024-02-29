<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('dashboard') }}">New Co.</a>

        <form action="{{ route('logout') }}" method="post" class="d-flex">
            @csrf
            <input type="submit" value="Logout" class="btn btn-outline-info d-flex">
        </form>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
