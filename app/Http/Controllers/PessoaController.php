<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pessoa;


class PessoaController extends Controller
{
    public function index()
    {
        return view('app.pessoa.index');
    }
    
    public function listar(Request $request)
    {
       $pessoas = Pessoa::where('nome','like', "%{$request->search}%")
       ->orWhere('email','like',"%{$request->search}%")
       ->orWhere('doc','like',"%{$request->search}%")       
       ->orWhere('uf','like',"%{$request->search}%")
       ->orWhere('cidade','like',"%{$request->search}%")
       ->paginate();
        
        return view('app.pessoa.listar', ['pessoas' => $pessoas]);
    }

 
    public function salvar(Request $request){
     
      $msg = '';
      //inclusão
      if($request->input('_token') != '' && $request->input('id') =='')
        {
          $regras=[
            'nome' => 'required|min:3|max:40',
            'email' => 'email',
            'uf' => 'required|min:2|max:2',
            'cidade' => 'required|min:3|max:50',
            'doc' => 'required'
           ]; 

          $feedback = [
            'required' => 'O Campo:attribute deve ser preenchido',
            'nome.min' => 'O Campo deve ter no mínimo 3 caracteres',
            'nome.max' => 'O Campo deve ter no máximo 40 caracteres',
            'uf.min' => 'O Campo deve ter no mínimo 2 caracteres',
            'uf.max' => 'O Campo deve ter no máximo 2 caracteres',
            'cidade.min' => 'O Campo deve ter no mínimo 3 caracteres',
            'cidade.max' => 'O Campo deve ter no máximo 40 caracteres',
            'email.email' => 'Email deve ser valido!'
            
          ];

          $request -> validate($regras, $feedback);

          

          $pessoa = new Pessoa();
          
          if($request->status == 'checked'){

            $pessoa->status = 'A';  
            
          

        } 
        else{

            $pessoa->status = 'B';
            
           
        }   

          $pessoa -> nome = $request->input('nome');
          $pessoa -> uf = $request->input('uf');
          $pessoa -> cidade = $request->input('cidade');
          $pessoa -> email = $request->input('email');
          $pessoa -> doc = $request->input('doc');
          $pessoa -> contato = $request->input('contato');
          $pessoa->save();

          $msg = 'Pessoa cadastrado com sucesso!';
                    
          
        }

        //edição
        if($request->input('_token') != '' && $request->input('id') !=''){
          
          $pessoa = Pessoa::find($request->input('id'));          
          $update = $pessoa -> update($request->all());

          if($update){
            $msg = 'Atualização realizada com sucesso';
          }else{
            $msg = 'Update apresentou problema';
          }

          return redirect()->route('app.pessoa.editar', ['id'=> $request->input('id'), 'msg'=>$msg]);
        }

     
        
      return view('app.pessoa.salvar', ['msg'=>$msg]);
    }

    public function editar($id, $msg = ''){
      $pessoa = Pessoa::find($id);

      return view('app.pessoa.salvar',['pessoa'=>$pessoa, 'msg'=>$msg]);
      
    }

    public function excluir($id){                   
      Pessoa::find($id)->delete();
      return redirect()->route('app.pessoa');
    }
}
?>

  <script>


//função pra verificar cpf ou cnpj
function validaDoc(){
  let tamanho = document.getElementById('inp').value.length
  
  if(tamanho>13){
    document.getElementById('inp').value = masks.cnpj(document.getElementById('inp').value)
  }else{
    document.getElementById('inp').value = masks.cpf(document.getElementById('inp').value)
  }
   
  
}

function validaCont(){
  document.getElementById('contato').value = masks.phone(document.getElementById('contato').value)
}
//mascaras
const masks = {
  cpf (value) {
    return value
      .replace(/\D+/g, '')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d{1,2})/, '$1-$2')
      .replace(/(-\d{2})\d+?$/, '$1')
  },
  cnpj (value) {
    return value
      .replace(/\D+/g, '')
      .replace(/(\d{2})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1/$2')
      .replace(/(\d{4})(\d)/, '$1-$2')
      .replace(/(-\d{2})\d+?$/, '$1')
  },
  phone (value) {
    return value
      .replace(/\D+/g, '')
      .replace(/(\d{2})(\d)/, '($1) $2')
      .replace(/(\d{4})(\d)/, '$1-$2')
      .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
      .replace(/(-\d{4})\d+?$/, '$1')
  }
}

</script>