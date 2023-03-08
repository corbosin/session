@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-body table-responsive p-0">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>IP</th>
                        <th>ID</th>
                        <th>Последняя активность</th>
                        <th colspan="2" class="text-center">Завершить</th>
                    </tr>
                    </thead>
                    <div class="card-body table-responsive p-0">
                    <tbody>
                    @foreach($sessions as $session)
                        <tr>
                            <td>{{ $session->ip_address }}</td>
                            <td>{{ $session->id }}</td>
                            <td>{{ date('Y-m-d H:i:s', $session->last_activity) }}</td>

                            <td>
                            <form action="{{ route('session.delete', ['id' => $session->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        Завершить
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <p>


                    @endforeach
                    <form action="{{ route('session.deleteAll') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">sign out all</button>
                    </form>

                    </p>
                    <p>Количество сессий: {{ $sessionCount }}</p>
                    </tbody>
                    </div>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
