@extends('app.layouts.basic')

@section('title', 'Produtos')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>

        @include('app.fornecedor.partials.menu', ['add' => true])

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                @if(!empty($produtos))
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Peso</th>
                                <th>Unidade Id</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>{{$produto->peso}}</td>
                                    <td>{{$produto->unidade_id}}</td>
                                    <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                                    <td><a href="{{route('produto.destroy', ['produto' => $produto->id])}}">Excluir</a></td>
                                    <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $produtos->appends($request)->links() }}

                    <!--
                        <br/>
                        {{ $produtos->count() }} - Total de registros por página
                        <br/>
                        {{ $produtos->total() }} - Total de registros por página
                        <br/>
                        {{ $produtos->firstItem() }} - Número do primeiro registro da página
                        <br/>
                        {{ $produtos->lastItem() }} - Número do último registro da página
                    -->

                    <br/>
                    Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                @else
                    <p>Não foram encontrados produtos!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
