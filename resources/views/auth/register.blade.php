<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Task Manager 1.0</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <div id="auth__buttons">
                        <a href="{{ route('index') }}" class="btn btn-light">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mt-5">Welcome to Task Manager 1.0</h1>
                    <p class="text-center text-info form-text">By: Sílvio Silva</p>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <form id="register" class="col-md-6 mt-2" action="{{ route('register') }}" method="POST">
                    @method('POST')
                    @csrf
                    @if (session('message'))
                        <div class="alert alert-{{ session('type') }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
