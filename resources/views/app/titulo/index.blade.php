<h3>Listar titulos</h3>

  <div class="conteudo-pagina">
    <div class = "titulo-pagina">
        <p>Pessoa - Listar</p>
    </div>

     <div class = "menu">
        <ul>
                <li><a href="{{ route('titulo.create')}}">Novo</a></li>

          <li><a href=""></a>Consulta</li>
        </ul>
    </div>

    <div style="width: 90%; margin-left: auto; margin-right: auto;">
      <table border="1" width="100%">
          <thead>
            <tr>
              <th>Desc</th>
              <th>Valor</th>
              <th>OBS</th>
              <th>Data Venc</th>
              <th>Data Pgto</th>
              <th>Forma Pgto</th>
              <th>Tipo Pgto</th>
              <th>Movimentação</th>
              <th>Status</th>
            </tr>
          </thead>

       <tbody>   
           @foreach ($titulos as $titulo)
            <tr>
              <td>{{$titulo->desc}}</td>
              <td>{{$titulo->valor}}</td>
              <td>{{$titulo->data_venc}}</td>
              <td>{{$titulo->data_pag_rec}}</td>
              <td>{{$titulo->form_pag}}</td>
              <td>{{$titulo->tipo_pag}}</td>
              <td>{{$titulo->movim}}</td>
              <td>{{$titulo->status}}</td>
              <td><a href="">Excluir</a></td>
              <td><a href="">Editar</a></td>
            </tr>
           @endforeach
       </tbody>
      </table>

     
    </div>
  </div>
