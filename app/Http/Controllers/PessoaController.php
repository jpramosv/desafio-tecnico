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
       $pessoas = Pessoa::where('nome','like','%'.$request->input('nome').'%')
       ->where('email','like','%'.$request->input('email').'%')
       ->where('doc','like','%'.$request->input('doc').'%')       
       ->where('uf','like','%'.$request->input('uf').'%')
       ->where('cidade','like','%'.$request->input('cidade').'%')
       ->get();
        
        return view('app.pessoa.listar', ['pessoas' => $pessoas]);
    }

    public function adicionar(Request $request){

        print_r($request->all());
        print_r('teste');

        if($request->input('_token') != '')
        {
          $regras=[
            'nome' => 'required|min:3|max:40',
            'contato' => 'required',
            'email' => 'required',
            'doc' => 'required',
            'tipo' =>'required'
          ]; 

          $feedback = [
            'required' => 'O Campo:atribute deve ser preenchido'
          ];

          $request -> validate($regras, $feedback);

          
          
          
        }
        $pessoa = new Pessoa();
        $pessoa->create($request->all());
        return view('app.pessoa.adicionar');
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
          
          if($request->cpf == 'checked'){

            $pessoa->tipo = 0;  
            
          

        } 
        else{

            $pessoa->tipo = 1;
            
           
        }   

          $pessoa -> nome = $request->input('nome');
          $pessoa -> uf = $request->input('uf');
          $pessoa -> cidade = $request->input('cidade');
          $pessoa -> email = $request->input('email');
          $pessoa -> doc = $request->input('doc');
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
