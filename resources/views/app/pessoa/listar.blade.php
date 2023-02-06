@extends('layouts.app')

@section('content') 
<h3>Listagem de pessoas</h3>

  <div class="conteudo-pagina">
     <div class = "menu">
     
     <form action="{{ route('app.pessoa.listar')}}" method = "post">
      @csrf
       <input name='search' type="text" placeholder="Filtrar">
       <button type="submit">Filtrar</button>
       <button> <a href="{{ route('app.pessoa.salvar')}}">Novo</a></button>
     </form>
     
    
    </div>
     
   <div class="table-responsive">

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">CPF/CNPJ</th>
      <th scope="col">Status</th>
      <th scope="col">Cidade</th>
      <th scope="col">UF</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pessoas as $pessoa)
            <th scope="row">{{$pessoa->id}}</th>
              <td>{{$pessoa->nome}}</td>
              <td>{{$pessoa->email}}</td>
              <td>{{$pessoa->doc}}</td>
              <td>{{$pessoa->status =='A'?'ATIVO':'BLOQUEADO'}}</td>
              <td>{{$pessoa->cidade}}</td>
              <td>{{$pessoa->uf}}</td>
              <td><a href="{{ route('app.pessoa.excluir',$pessoa->id )}}">Excluir</a> - 
              <a href="{{ route('app.pessoa.editar',$pessoa->id )}}">Editar</a></td>
           
            </tr>
           @endforeach
     
  </tbody>
</table>

   </div>
   
  </div>
 
@endsection   