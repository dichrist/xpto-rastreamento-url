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
                        <th>Data da última consulta</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($urls as $url)
                    <tr>
                        <td>{{ $url->link }}</td>
                        <td>{{ $url->status_code }}</td>
                        <td>{{ date('d-m-Y H:i:s', strtotime($url->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('url.details', ['id' => $url->id]) }}">Detalhes</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>Sem urls cadastradas.</p> 
        @endif
    </div>

    <script>
        $("body").on("click", "#updateList", function(e){
            e.preventDefault();

            if ( $('.table tbody').length == 0){                
                alert('Não há registros para atualizar');
                return;
            }

            UpdateUrlData();
        });

        function UpdateUrlData()
        {
            $.ajax({
                url: "https://diegosouza.tec.br/xpto/admin/url/request", 
                success: function(data){

                    let jsonData = JSON.parse(data);

                    $("tbody").empty();

                    $(jsonData).each(function(i, e){
                        
                        let rowTable = "<tr>"; 
                        rowTable += "<td>" + e.link + "</td>";
                        rowTable += "<td>" + e.status_code + "</td>";
                        rowTable += "<td>" + e.updated_at + "</td>";
                        rowTable += "<td><a href='https://diegosouza.tec.br/xpto/admin/url/" + e.id + "'>Detalhes</td>";
                        rowTable += "</tr>";
                        
                        $("tbody").append(rowTable);
                    })
                }
            });
        }

    </script>

@endsection