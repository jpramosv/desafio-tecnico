@extends('layouts.app')

@section('content') 
</div>
    <ul>
      <li><a href="{{ route('titulo.index')}}">Voltar</a></li>
    </ul>
<div>
<h1>Titulos</h1>
<p>Visualizar Titulos<p>

<div>
  <table border="1">
    <tr>
      <td>ID:</td>
      <td>{{ $titulo->id }}</td>
    </tr>
    <tr>
      <td>Desc:</td>
      <td>{{ $titulo->desc }}</td>
    </tr>
    <tr>
      <td>Valor:</td>
      <td>{{ $titulo->valor }}</td>
    </tr>
    <tr>
      <td>Obs:</td>
      <td>{{ $titulo->obs }}</td>
    </tr>
    <tr>
      <td>Data Vencimento:</td>
      <td>{{ $titulo->data_venc }}</td>
    </tr>
    <tr>
      <td>Forma de pagamento:</td>
      <td>{{ $titulo->form_pag }}</td>
    </tr>
    <tr>
      <td>Tipo de Pagamento:</td>
      <td>{{ $titulo->tipo_pag }}</td>
    </tr>
    <tr>
      <td>Credito ou Debito:</td>
      <td>{{ $titulo->movim }}</td>
    </tr>

  </table>
</div>
</div>
    
@endsection

  

