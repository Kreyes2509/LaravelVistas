<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class PruebaController extends Controller
{
    public function prueba()
    {
        $carrito = Carrito::select('carrito.cantidad')->where('producto_id','=',1)->first();
        if($carrito == null)
        {
            return "error";
        }

        return $carrito;
    }

    public function destroy($id)
    {
        $deletePro = Carrito::find($id);
        $deletePro->delete();
        return $deletePro;
    }

}
