{{--
    Coisas Úteis:
    -> Isso é um comentário no blade
    -> Para exibir variaveis no blade, basta usar o @dd($variavel)
    -> Empty =
        - ''
        - 0
        - 0.0
        - null
        - false
        - array()
        - $var
--}}

<h3>Fornecedor</h3>

@isset($fornecedores)
    @forelse($fornecedores as $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br/>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br/>
        Status: {{ $fornecedor['status'] }}
        <br/>
        CNPJ: {{ $fornecedor['cnpj'] }}
        <br/>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br/>
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @case('85')
                Fortakeza - CE
                @break
        @endswitch
        <br/>
        @if($loop->first)
            Primeira Iteração do Loop
        @endif
         @if($loop->last)
            Última Iteração do Loop
            <br/>
            Total de registros: {{$loop->count}}
        @endif
        <hr/>
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset
