<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function categoria(Request $request){

       
        return view('site.categoria');

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
        return redirect()->route('site.index');
    }
    

    
}
