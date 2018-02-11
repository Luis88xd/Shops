<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{

	public function listarGaleria(Request $request){

		$contador = $request->contador;

		$query = DB::select('SELECT * FROM Galeria LIMIT '.$contador.',20');
		return json_encode($query);
	}

	// Subir una o varias imágenes
	public function subirImagen(Request $request){

        throw new TokenMismatchException;
		$image = $request->file('arreglo');

		for($x = 0;$x < count($image); $x++){
            $orden ++;
            $math = rand(1,1000);
            $name = time().$math.'_'.$image[$x]->getClientOriginalName();
            $destinationPath = public_path('/uploads/products');
            $image[$x]->move($destinationPath, $name);
            array_push($galeria,array(
                'galFoto'=>$name,
                'galOrden'=>$orden,
                'idEncabezadoProducto'=>$id
            ));
        }

        return true;
	}
}