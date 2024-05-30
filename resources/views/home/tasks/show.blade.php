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
                        @method('POST')
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger">Logout</a>
                    </div>
                    <a href="{{ route('dashboard') }}" class="nav nav-link">Home</a>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mt-5">More about your Task</h1>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <form id="createTask" class="col-md-6 mt-5" action="{{ route('task.create') }}" method="POST">
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
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            aria-describedby="titleHelp" value="{{ $task->task_title }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ $task->task_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="0" {{ $task->task_status == 0 ? 'selected' : '' }}>To Do</option>
                            <option value="1" {{ $task->task_status == 1 ? 'selected' : '' }}>Doing</option>
                            <option value="2" {{ $task->task_status == 2 ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>
                    <a href="{{ route('task.update.view', $task->id) }}" class="text-decoration-none">Update task</a>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
