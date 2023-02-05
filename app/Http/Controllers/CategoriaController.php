<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function categoria(Request $request){

       
        return view('site/categoria_salvar');

    }

    public function salvar(Request $request){
        $request->validate([
           'desc'=>'required'
        ],
        [
            'desc.required' => 'A descrição precisa ser preenchida!'
        ]
            );
        Categoria::create($request->all());
        return view('site/categoria_salvar');
    }
    

    
}
