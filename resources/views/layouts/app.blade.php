<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-3">
    <a href="#" class="navbar-brand">Admin</a>
    <div>
        <a href="{{route('company.index')}}" class="btn btn-sm btn-outline-light me-2">Companies</a>
        <a href="/products" class="btn btn-sm btn-outline-light me-2">Products</a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button class="btn btn-sm btn-danger">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
