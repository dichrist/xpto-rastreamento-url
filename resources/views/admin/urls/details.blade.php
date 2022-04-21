@extends('admin.master.master', ['subtitle' => 'Detalhes da Url'])

@section('content')

    <div class="container-fluid">
        <p><span class="font-weight-bold">Link: </span>{{ $url->link }}</p>
        <p><span class="font-weight-bold">Status: </span>{{ $url->status_code }}</p>
        <p><span class="font-weight-bold">Consulta mais recente: </span>{{ date('d-m-Y H:i:s', strtotime($url->updated_at)) }}</p>
        <div class="card card p-4">
            <p class="text-center text-uppercase alert alert-info">Corpo da resposta</p>
            {!! html_entity_decode($url->content_body) !!}
        </div>
    </div>

@endsection