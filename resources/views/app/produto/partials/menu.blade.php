<div class="menu">
    <ul>
        @if(!empty($add))
            <li><a href="{{route('produto.index')}}">Novo</a></li>
        @else
            <li><a href="{{route('produto.index')}}">Voltar</a></li>
        @endif
        <li><a href="{{route('produto.index')}}">Consulta</a></li>
    </ul>
</div>
