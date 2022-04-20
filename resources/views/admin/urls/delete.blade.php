@extends('admin.master.master')

@section('content')

    <p>Ter certeza que deseja excluir a url solicitada?</p>

    <form action="{{ route('urls.delete', ['id'] => $url->id) }}" method="post">
        @csrf 
        @method("DELETE")

        <button class="btn btn-danger">Excluir</button>
        <a class="btn btn-default" href="#">Voltar</a>
    </form>

@endsection