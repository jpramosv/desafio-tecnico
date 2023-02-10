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
<input id="inp" onkeypress= 'validaDoc()' maxlength = '18' name='doc' value = "{{$pessoa->doc ?? old('doc')}}" type="text" placeholder="CPNF/CNPJ">
{{ $errors->has('doc') ? $errors->first('doc'): ''}}
<br>
<input onkeydown= 'validaCont()' id="contato" name='contato' value = "{{$pessoa->contato ?? old('contato')}}" type="text" placeholder="(99) 99999-9999">
<br>
<h4>Status</h4>
<input name='ativo' id='ativo' value="{{$pessoa->status ?? 'checked'}}" type="radio"  >
<label for="ativo"> Ativo</label><br>
<input name='bloqueado' id='bloqueado' value="{{$pessoa->status ?? 'checked'}}" type="radio">
<label for="bloqueado"> Bloqueado</label><br>
{{ $errors->has('status') ? $errors->first('status'): ''}}

<input name='uf' value = "{{$pessoa->uf ?? old('uf')}}" type="text" placeholder="Estado">
{{ $errors->has('uf') ? $errors->first('uf'): ''}}

<input name='cidade' value = "{{$pessoa->uf ?? old('cidade')}}" type="text" placeholder="cidade">
{{ $errors->has('cidade') ? $errors->first('cidade'): ''}}
<br><br>

<button type="submit">ENVIAR</button>
</form>
</div>
@endsection
    


  

