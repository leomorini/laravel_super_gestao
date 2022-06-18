{{$slot}}

@if($errors->any())
    <div style="width: 100%; margin-bottom: 10px; padding: 10px; border-radius: 10px; background: #c71050">
        @foreach($errors->all() as $error)
            <p style="color: white; font-weight: bold;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{route('site.contato')}}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{$classe}}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }} <br/>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$classe}}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }} <br/>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$classe}}">
    {{ $errors->has('email') ? $errors->first('email') : '' }} <br/>
    <select name="motivo_contatos_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivo_contatos as $value)
            <option value="{{$value->id}}" {{ old('motivo_contatos_id') == $value->id ? 'selected' : '' }}>{{$value->motivo_contato}}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }} <br/>
    <textarea name="mensagem" class="{{$classe}}">{{ old('mensagem') ?? 'Preencha aqui a sua mensagem' }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }} <br/>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
