<h3>Pessoas Listar</h3>

  <div class="conteudo-pagina">
    <div class = "titulo-pagina">
        <p>Pessoa - Listar</p>
    </div>

     <div class = "menu">
        <ul>
          <li><a href=""></a>Novo</li>
          <li><a href=""></a>Consulta</li>
        </ul>
    </div>

    <div style="width: 90%; margin-left: auto; margin-right: auto;">
      <table border="1" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>CPF/CNPJ</th>
              <th>UF</th>
              <th>Cidade</th>
            </tr>
          </thead>

       <tbody>   
           @foreach ($pessoas as $pessoa)
            <tr>
              <td>{{$pessoa->nome}}</td>
              <td>{{$pessoa->email}}</td>
              <td>{{$pessoa->doc}}</td>
              <td>{{$pessoa->uf}}</td>
              <td>{{$pessoa->cidade}}</td>
              <td><a href="{{ route('app.pessoa.excluir',$pessoa->id )}}">Excluir</a></td>
              <td><a href="{{ route('app.pessoa.editar',$pessoa->id )}}">Editar</a></td>
            </tr>
           @endforeach
       </tbody>
      </table>

     
    </div>
  </div>
