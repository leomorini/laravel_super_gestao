@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        @include('app.fornecedor.partials.menu')

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                @if(!empty($fornecedores))
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Site</th>
                                <th>UF</th>
                                <th>E-mail</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{$fornecedor->nome}}</td>
                                    <td>{{$fornecedor->site}}</td>
                                    <td>{{$fornecedor->uf}}</td>
                                    <td>{{$fornecedor->mail}}</td>
                                    <td><a href="{{route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                                    <td><a href="{{route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Não foram encontrados fornecedores!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
