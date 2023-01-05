<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Categorias.categorias")->with(['categorias'=>Categoria::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required'
        ]);
        $categorias = new Categoria();
        $categorias->categoria = $request->input('categoria');
        $categorias->save();

        return redirect('/categorias')->with(['msg'=>"operacion realizada"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = Categoria::find($id);
        return view('Categorias.EditarCate',compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion = $request->validate([
            'categoria' => 'required'
        ]);

        if(!$validacion)
        {
            return redirect('/EditarCate');
        }
        else
        {
            $categorias = Categoria::find($id);
            $categorias->nombre = $request->input('categoria');
            $categorias->save();
            return redirect('/categorias');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias =Categoria::find($id);
        $categorias->delete();

        return redirect('/categorias')->with(['msg'=>"operacion realizada"]);
    }
}
