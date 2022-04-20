@extends('admin.master.master', ['subtitle' => 'Lista de Urls'])

@section('content')

    <div class="container-fluid">

        <a class="mt-3 mb-3 btn btn-primary" href="{{ route('url.create') }}">Nova Url</a>
        <a class="mt-3 mb-3 btn btn btn-secondary" id="updateList" href="#">Atualizar lista</a>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {!! session('message') !!}
            </div>
        @endif

        @if(count($urls) > 0)
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Link</th>
                        <th>Status HTTP</th>
                        <th>Data Cadastro</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($urls as $url)
                    <tr>
                        <td>{{ $url->link }}</td>
                        <td>{{ $url->status_code }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($url->created_at)) }}</td>
                        <td>
                            <a href="{{ route('url.details', ['id' => $url->id]) }}">Detalhes</a>
                            <a href="#">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Sem urls cadastradas.</p> 
        @endif
    </div>

@endsection