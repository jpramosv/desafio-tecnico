<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Models\Pessoa;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = Titulo::paginate(3);
       
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function show(Titulo $titulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulo $titulo)
    {
        echo 'editou?';
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulo $titulo)
    {
        //
    }
}
