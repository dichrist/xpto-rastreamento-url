@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Links para url
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="mt-3 mb-3 btn btn-secondary" href="{{ route('urls.view') }}">Lista de Urls</a>
                    <a class="mt-3 mb-3 btn btn-primary" href="{{ route('url.create') }}">Cadastrar Url</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
