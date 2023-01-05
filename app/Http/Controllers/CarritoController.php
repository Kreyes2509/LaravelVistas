<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Productos;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{

    public function Detalle($id)
    {
        $producto = Productos::select(
            'productos.id','productos.nombre','productos.descripcion'
            ,'productos.precio','productos.stock','productos.imagen'
            ,'productos.categoria_id','categoria.categoria')
       ->join('categoria','categoria.id','=','productos.categoria_id')->where('productos.id',$id)->get();

       return view('Carrito.Detallepro',compact('producto'));
    }

    public function Carrito()
    {
        $carro = Carrito::select('productos.imagen','productos.nombre','productos.precio','carrito.cantidad','carrito.producto_id')
                        ->join('productos','productos.id','=','carrito.producto_id')
                        ->join('users','users.id','=','carrito.user_id')
                        ->where('carrito.user_id',Auth::user()->id)->get();
        return view('Carrito.Carrito',compact('carro'));
    }

    public function addProductoCarrito(Request $request,$idPro)
    {

        $carrito = Carrito::select('carrito.producto_id')->where('producto_id','=',$idPro)->first();
        if($carrito == null)
        {
            $carrito = new Carrito();
            $carrito->cantidad = $request->input('cantidad');
            $carrito->user_id = $request->input('user_id');
            $carrito->producto_id = $idPro;
            $carrito->save();

            return redirect('/carrito')->with('msg','Agregado correctamente');
        }
        $carrito = Carrito::select('carrito.cantidad')->where('producto_id','=',$idPro)->first();
        $ProductoExiste = Carrito::find($idPro);
        $ProductoExiste->producto_id = $idPro;
        $cantidad = $request->input('cantidad') + $carrito->cantidad;
        $ProductoExiste->user_id = $request->input('user_id');
        $ProductoExiste->cantidad = $cantidad;
        $ProductoExiste->save();

        return redirect('/carrito')->with('msg','Agregado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $deletePro = Carrito::find($idPro);
        $deletePro->delete();
        return redirect('/carrito')->with('msg','Eliminado correctamente');
    }
}
