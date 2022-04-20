@extends('admin.master.master', ['subtitle' => 'Cadastro de Url'])

@section('content')

    <div class="container-fluid">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('url.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Ex.: http://www.xpto.com.br">
            </div>

            <button class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection