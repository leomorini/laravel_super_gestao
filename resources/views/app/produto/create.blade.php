@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produto</p>
        </div>

        @include('app.fornecedor.partials.menu')

        <div class="informacao-pagina">
            {{$msg ?? ''}}
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('produto.store') }}">
                    <input type="hidden" name="id" value="{{$produto->id ?? ''}}" />

                    @csrf
                    <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome" class="borda-preta" />
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descricao" value="{{$produto->descricao ?? old('descricao')}}" placeholder="Descrição" class="borda-preta" />
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="numeric" name="peso" value="{{$produto->peso ?? old('peso')}}" placeholder="Peso" class="borda-preta" />
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    <select name="unidade_id">
                        <option> -- Selecione a Unidade de Medida -- </option>
                        @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                        @endforeach
                    </select>

                    <input type="text" name="unidade_id" value="{{$produto->unidade_id ?? old('unidade_id')}}" placeholder="Unidade_id" class="borda-preta" />
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
