<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
    	$data['menu'] = DB::table('Menu')->where('idGrupo','2')->get();
    	return view('Inventario/Categoria/Body',$data);
    }

    // Listar todas las categorias
    public function listarCategorias(){
    	$query = DB::table('Categoria');
    	if($query->count() > 0){
    		return $query->get();
    	}else{
    		return "false";
    	}
    }

    // Agregar categorias
    public function agregarCategoria(Request $request){
    	$nombre = $request->input('nombre');
    	$query = DB::table('Categoria')->insert(['catCategoria'=>$nombre]);

    	if($query){
    		return $this->listarCategorias();
    	}else{
    		return "false";
    	}
    }

    // Obtener una categoria en especifico
    public function obtenerCategoria(Request $request){
    	$id = $request->input('id');
    	$query = DB::table('Categoria')->where('idCategoria',$id);
    	if($query->count() > 0){
    		return $query->get();
    	}else{
    		return "false";
    	}
    }

    // ActualizarCategoria
    public function actualizarCategoria(Request $request){
    	$id = $request->input('id');
    	$data = array('catCategoria'=>$request->input('nombre'));
    	$query = DB::table('Categoria')->where('idCategoria',$id)->update($data);
    	if($query){
    		return $this->listarCategorias();
    	}else{
    		return "false";
    	}
    }

    // EliminarCategoria
    public function eliminarCategoria(Request $request){
    	$id = $request->input('id');

    	$query = DB::table('Categoria')->where('idCategoria',$id)->delete();
    	if($query){
    		return $this->listarCategorias();
    	}else{
    		return "false";
    	}
    }
    
}
