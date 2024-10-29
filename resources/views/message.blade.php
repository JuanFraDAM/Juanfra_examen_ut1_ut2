<!doctype html>
<html lang="en">

<head>
    <title>Edicion de mensaje</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.3 -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
</head>

<body>
    <main>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row justify-content-center align-items-center g-2">
                <div class="col"></div>
                <div class="col">
                    <h2>Edicion de mensajes</h2>
                </div>
                <div class="col"></div>
            </div>
            <form action="{{ route('edit.message', $message->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col"></div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" name="text" id="message" rows="3">{{ $message->text }}</textarea>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col"></div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="black" value="1"
                                id="blackCheck" @if ($message->black) checked @endif />
                            <label class="form-check-label" for="blackCheck"> Negrita </label>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col"></div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="sub" value="1" id="subCheck"
                                @if ($message->sub) checked @endif />
                            <label class="form-check-label" for="subCheck"> Subrayado </label>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col"></div>
                    <div class="col">
                        <div class="d-grid gap-2">
                            <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">
                                Aceptar
                            </button>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>


            </form>

        </div>

    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
