@extends('admin.master.master', ['subtitle' => 'Painel'])

@section('content')

    <div class="card p-5">
        <a class="mt-3 mb-3 btn btn-secondary" href="{{ route('urls.view') }}">Lista de Urls</a>
        <a class="mt-3 mb-3 btn btn-primary" href="{{ route('url.create') }}">Cadastrar Url</a>
    </div>

@endsection