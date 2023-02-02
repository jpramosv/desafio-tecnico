<div>

</div>
    <ul>
      <li><a href="{{ route('titulo.index')}}">Voltar</a></li>
    </ul>
<div>
<h1>Titulos</h1>
<p>Registre Titulos<p>

<form action ="" method="post">

@csrf
<input name='Descrição' value = "" type="text" placeholder="Descrição">

<input name='Valor' value = "" type="text" placeholder="Valor">

<input name='Obs' value = "" type="text" placeholder="Obs">

 <label for="pgt">Informe a data de vencimento:</label>
 <input type="date" id="pgt" name="pgt">
<br>
<br>
 <input name='Forma de pagamento' value = "" type="text" placeholder="Forma de pagamento">

 <input name='Tipo de pagamento' value = "" type="text" placeholder="Tipo de pagamento">

<select name="pessoa_id">
  <option> --selecione a pessoa </option>
  @foreach ( $pessoas as $pessoa )
       <option value="{{$pessoa->id}}">"{{$pessoa->nome}}"</option>
  @endforeach 
</select>

<select name="pessoa_id">
  <option> --selecione a categoria </option>
  @foreach ( $categorias as $categoria )
       <option value="{{$categoria->id}}">"{{$categoria->desc}}"</option>
  @endforeach 
</select>

<h4>Movimentação</h4>
<input name='credito' id='credito' value="" type="radio"  >
<label for="credito"> Credito</label><br>
<input name='debito' id='debito' value="" type="radio"  >
<label for="credito"> Debito</label><br>


<button type="submit">ENVIAR</button>
</form>
</div>
    


  

