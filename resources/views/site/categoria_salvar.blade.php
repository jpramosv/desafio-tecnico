@extends('layouts.app')

@section('content')
 <div class="contato">

                  <!--   <h1>Categoria</h1>
                    <p>Digite a categoria.<p>
                    <form action = {{route('app.categoria.categoria_salvar')}} method="post">
                    @csrf
                        <input name='desc' value = "{{old('nome')}}" type="text" placeholder="Nome" class="borda-branca">
                            @If($errors->has('desc'))
                             {{ $errors->first('desc')}}
                            @endif
                        <button type="submit" class="borda-branca">ENVIAR</button>
                    </form>
                    @if($errors->any())
                        @foreach ( $errors->all() as $erro )

                        {{ $erro }}
                            
                        @endforeach
                    @endif
                </div>  !-->
            
    <div class="container">
        <div class="row">
            <form method ='POST' class="col-6" action="{{route('app.categoria.categoria_salvar')}}">
             @csrf
                <div class="form-group">
                    <label for="inputCate">Categoria</label>
                    <input name = 'desc' value = "{{old('nome')}}" type="text" class="form-control" id="inputCate" placeholder="categoria">
                     @If($errors->has('desc'))
                             {{ $errors->first('desc')}}
                     @endif
                </div>
                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
                
            </form>
        </div>
         
    </div>


@endsection           
        

       
       
 