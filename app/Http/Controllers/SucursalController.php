<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SucursalController extends Controller
{
    public function index(){
        $data['menu'] = DB::table('Menu')->where('idGrupo','2')->get();
    	return view("Inventario/Sucursales/Body",$data);
    }

    public function listarSucursales(){
    	$query = DB::table('Sucursales');
    	if($query->count() > 0){
    		return $query->get();
    	}else{
    		return "false";
    	}
    }

    public function obtenerSucursal(Request $request){
    	$id = $request->input('id');
    	$query = DB::table('Sucursales')->where('idSucursal',$id);
    	if($query){
    		return $query->get();
    	}else{
    		return "false";
    	}
    }

    public function agregarSucursal(Request $request, Closure $next){
    	$data = array(
    		'idUsuario'=>$request->input('idUsuario'),
    		'direccion'=>$request->input('direccion'),
    		'telefono'=>$request->input('telefono'),
    		'estado'=>$request->input('estado')
    	);

    	$query = DB::table('Sucursales')->insert($data);
    	if($query){
    		return $this->listarSucursal();
    	}else{
    		return "false";
    	}
    }

    public function actualizarSucursal(Request $request){

    	$id = $request->input('id');
		$data = array(
    		'idUsuario'=>$request->input('idUsuario'),
    		'direccion'=>$request->input('direccion'),
    		'telefono'=>$request->input('telefono'),
    		'estado'=>$request->input('estado')
    	);    	

    	$query = DB::table('Sucursales')->where('idSucursal',$id)->update();
    	if($query){
    		return $this->listarSucursal();
    	}else{
    		return "false";
    	}
    }

    public function eliminarSucursal(Request $request){
    	$id = $request->input('id');
    	$query = DB::table('Sucursales')->where('idSucursal')->delete();

    	if($query){
    		return $this->listarSucursal();
    	}else{
    		return "false";
    	}
    }
}
