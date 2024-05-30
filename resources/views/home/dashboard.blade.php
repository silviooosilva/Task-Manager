@php
    $helper = new App\Helper();
@endphp
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
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center mt-5">Yours Tasks</h1>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('task.create.view') }}" class="btn btn-primary mt-5">Create Task</a>
            </div>



            <table class="table table-responsive table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>{{ $task->task_title }}</td>
                                <td>{{ $helper->mappingStatus($task->task_status) }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('task.update.view', $task->id) }}"><button
                                            class="btn btn-outline-primary me-2">Edit task</button></a>
                                    <form action="{{ route('task.delete', $task->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger me-2">Delete task</button>
                                    </form>
                                    <a href="{{ route('task.details.view', $task->id) }}"><button class="btn btn-outline-success">Show details</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-danger">No tasks to show.</div>
                            </td>
                        </tr>
                </tbody>
                @endif
            </table>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
