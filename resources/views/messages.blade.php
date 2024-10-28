<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <!-- Bootstrap CSS v5.3.3 -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
</head>

<body>
    <main>
        <div class="vw-100 vh-100 py-2">
            <div class="w-75 h-100 mx-auto">
                @if ($messages->isEmpty())
                    <p>No hay mensajes en la base de datos</p>
                @else
                    <table class="table table-hover mh-100">
                        <caption>Lista de mensajes</caption>
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col-6">Mensaje</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <th scope="row">{{ $message->id }}</th>
                                    <td>
                                        @if ($message->black && $message->sub)
                                            <b><u>{{ $message->text }}</u></b>
                                        @elseif($message->black)
                                            <b>{{ $message->text }}</b>
                                        @elseif($message->sub)
                                            <u>{{ $message->text }}</u>@else{{ $message->text }}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- {{ route('doubt.show') }} --}}
                                        <form class="d-inline" action="{{ route('show.message', $message->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button name="edit" value="{{ $message->id }}" type="submit"
                                                class="btn btn-info">
                                                Editar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </main>
</body>
<!-- Bootstrap JavaScript Libraries -->
<script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
</script>

</html>
