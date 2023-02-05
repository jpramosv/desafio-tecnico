<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Pessoa;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = Titulo::paginate(10);       
        
        return view('app.titulo.index', ['titulos' => $titulo, 'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pessoas = Pessoa::all();
        $categorias = categoria::all();
        return view('app/titulo/salvar_titulo',['pessoas'=>$pessoas, 'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras=[
            'desc' => 'required|max:200',
            'valor' => 'required',
            'data_venc'=>'required',
            'form_pag' => 'required',
            'tipo_pag' => 'required',
            'movim' => 'required'
           ]; 

          $feedback = [
            'required' => 'O Campo :attribute deve ser preenchido',
            'desc' => 'O Campo deve ter no máximo 200 caracteres',           
            
          ];

          $request -> validate($regras, $feedback);
       

        if($request->movim == 'checked'){

            $request->merge([
                'movim' => 'C'            
            ]);        
          

        } 
        else{
            $request->merge([
                'movim' => 'D'            
            ]);          
           
        }
        
        $request->request->add(['status' => 'p']);
     
        Titulo::create($request->all());

        return redirect()->route('titulo.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function show(Titulo $titulo)
    {
        return view('app/titulo/show_titulos',['titulo'=>$titulo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulo $titulo)
    {
        $categorias = Categoria::all();
        $pessoas = Pessoa::all();

       return view('app.titulo.edit_titulo',['titulo'=>$titulo, 'pessoas'=>$pessoas , 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulo $titulo)
    {
        
        if($request->movim == 'checked'){

            $request->merge([
                'movim' => 'C'            
            ]);        
          

        } 
        else{
            $request->merge([
                'movim' => 'D'            
            ]);          
           
        }

       $titulo->update($request->all());
       return redirect()->route('titulo.show', ['titulo'=>$titulo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulo $titulo)
    {
        $titulo->delete();
        return redirect()->route('titulo.index');
    }
}
