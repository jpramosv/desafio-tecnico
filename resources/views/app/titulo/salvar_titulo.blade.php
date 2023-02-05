@extends('layouts.app')

@section('content')

<div>

<h1>Titulos</h1>
<p>Registre Titulos<p>

<form action = {{route('titulo.store')}} method="post">

@csrf
<input name='desc' value = "{{ $titulo->desc ?? old('desc')}}" type="text" placeholder="Descrição">
{{ $errors->has('desc') ? $errors->first('desc'): ''}}
<input name='valor' value = "{{ $titulo->valor ?? old('valor')}}" type="text" placeholder="Valor">
{{ $errors->has('valor') ? $errors->first('valor'): ''}}
<input name='obs' value = "{{ $titulo->obs ?? old('obs')}}" type="text" placeholder="Obs">

 <label for="pgt">Informe a data de vencimento:</label>
 <input type="date" id="pgt" name="data_venc" value ="{{ $titulo->data_venc ?? old('data_venc')}}">
 {{ $errors->has('data_venc') ? $errors->first('data_venc'): ''}}
 
<br>
<br>
 <input name='form_pag' value ="{{ $titulo->form_pag ?? old('form_pag')}}" type="text" placeholder="Forma de pagamento">
 {{ $errors->has('form_pag') ? $errors->first('form_pag'): ''}}
 <input name='tipo_pag' value = "{{ $titulo->tipo_pag ?? old('tipo_pag')}}" type="text" placeholder="Tipo de pagamento">
 {{ $errors->has('tipo_pag') ? $errors->first('tipo_pag'): ''}}
<select name="pessoa_id">
  <option> --selecione a pessoa </option>
  @foreach ( $pessoas as $pessoa )
       <option value="{{$pessoa->id}}" {{old('pessoa_id')==$pessoa->id?'selected':''}}>"{{$pessoa->nome ?? old('nome')}}"</option>
  @endforeach 
</select>

<select name="categoria_id">
  <option> --selecione a categoria </option>
  @foreach ( $categorias as $categoria )
       <option value="{{$categoria->id}}" {{old('categoria_id')==$categoria->id?'selected':''}}>"{{$categoria->desc ?? old('desc')}}"</option>
  @endforeach 
</select>

<h4>Movimentação</h4>
<input name='movim' id='credito' value="checked" type="radio"  >
<label for="credito"> Credito</label><br>
<input name='movim' id='debito' value="checked" type="radio"  >
<label for="credito"> Debito</label><br>


<button type="submit">ENVIAR</button>
</form>
</div>
@endsection 
    


  

