<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Productos::select(
                                    'productos.id','productos.nombre','productos.descripcion'
                                    ,'productos.precio','productos.stock','productos.imagen'
                                    ,'productos.categoria_id','categoria.categoria')
                               ->join('categoria','categoria.id','=','productos.categoria_id')->get();
        $categoria = Categoria::all();
        return view("Productos.productos",compact('producto','categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'imagen' => 'required|image|max:100000',
            'categoria_id' => 'required'
        ]);
        $producto = new Productos();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destinationPath = "images/";
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath,$filename);
            $producto->imagen = $destinationPath . $filename;
        }
        $producto->categoria_id = $request->input('categoria_id');
        $producto->save();

        return redirect('/productos')->with(['msg'=>"operacion realizada"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Productos::find($id);
        $categoria = Categoria::all();
        return view('Productos.Editpro',compact('productos','categoria'));
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'imagen' => 'required|image|max:100000',
            'categoria_id' => 'required'
        ]);
        if(!$validacion)
        {
            return redirect('/Editpro');
        }
        else
        {
            $producto = Productos::find($id);
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');
            $producto->stock = $request->input('stock');
            if($request->hasFile('imagen')){
                $file = $request->file('imagen');
                $destinationPath = "images/";
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('imagen')->move($destinationPath,$filename);
                $producto->imagen = $destinationPath . $filename;
            }
            $producto->categoria_id = $request->input('categoria_id');
            $producto->save();

            return redirect('/productos')->with(['msg'=>"operacion realizada"]);
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
        $categorias =Productos::find($id);
        $categorias->delete();

        return redirect('/productos')->with(['msg'=>"operacion realizada"]);
    }
}
