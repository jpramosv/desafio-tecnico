@extends('layouts.app')

@section('content') 
<div class="contato">
<h1>Pessoas</h1>
<p>Registre pessoas<p>
{{$msg ?? ''}}
<form action = {{route('app.pessoa.salvar')}} method="post">
<input type="hidden" name="id" value="{{ $pessoa->id ?? ''}}">
@csrf
<input name='nome' value = "{{ $pessoa->nome ?? old('nome')}}" type="text" placeholder="Nome">
{{ $errors->has('nome') ? $errors->first('nome'): ''}}

<input name='email' value = "{{ $pessoa->email ?? old('email')}}" type="text" placeholder="Email">
{{ $errors->has('email') ? $errors->first('email'): ''}}
<br>
<input name='doc' value = "{{$pessoa->doc ?? old('doc')}}" type="text" placeholder="CPNF/CNPJ">
{{ $errors->has('doc') ? $errors->first('doc'): ''}}
<br>
<h4>TIPO</h4>
<input name='cpf' id='cpf' value="{{$pessoa->tipo ?? 'checked'}}" type="radio"  >
<label for="cpf"> CPF</label><br>
<input name='cnpj' id='cnpj' value="{{$pessoa->tipo ?? 'checked'}}" type="radio">
<label for="cnpj"> CNPJ</label><br>
{{ $errors->has('tipo') ? $errors->first('tipo'): ''}}

<input name='uf' value = "{{old('uf')}}" type="text" placeholder="Estado">
{{ $errors->has('uf') ? $errors->first('uf'): ''}}

<input name='cidade' value = "{{old('cidade')}}" type="text" placeholder="cidade">
{{ $errors->has('cidade') ? $errors->first('cidade'): ''}}
<br><br>

<button type="submit">ENVIAR</button>
</form>
</div>
@endsection
    


  

