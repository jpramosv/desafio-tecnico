@extends('layouts.app')

@section('content') 
<h3>Pessoas</h3>

  <div class="conteudo-pagina">
    <div class = "titulo-pagina">
        <p>Pessoa</p>
    </div>

     <div class = "menu">
        <ul>
          <li><a href="{{ route('app.pessoa.salvar')}}">Novo</a></li>
          <li><a href=""></a>Consulta</li>
        </ul>
    </div>

    <div class = "inf">
        <form method = "post" action = "{{ route('app.pessoa.listar')}}">
        @csrf
          <input name='nome' type="text" placeholder="Nome">
          <input name='email' type="text" placeholder="Email">
          <input name='doc' type="text" placeholder="CPF/CNPJ">
          <button type = "submit">pesquisar</button>
        </form>
    </div>
  </div>
@endsection   


