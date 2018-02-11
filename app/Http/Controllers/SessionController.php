<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cache;

class SessionController extends Controller{
    
	// public function __construct(){

	// }

	public function index(){
		DB::connection('mysql');
		$query = DB::select('select * from Configuracion');

		if($query != null){
			$data['data'] = $query;
			return view("Session/Body",$data);
		}else{
			return view('Session/Install');
		}
	}

	public function agregar(Request $request){

		// Nombre del negocio
		$nombre = $request->input('nombre');
		$tipo = $request->input('tipo');

		// Datos de usuario
		$correo = $request->input('correo');
		$clave = $request->input('clave');
		$nombreUsuario = $request->input('nombreUsuario');
		$apellido = $request->input('apellido');

		$query = DB::table('Configuracion')->insert(['conNombre'=>$nombre,'conTipo'=>$tipo]);
		$query_user = DB::table('Usuario')->insert(
			[
				'usuNombre'=>$nombreUsuario,
				'usuApellido'=>$apellido,
				'usuCorreo'=>$correo,
				'usuClave'=>md5($clave),
				'idRol'=>'2'
			]
		);

		return "true";
	}

	public function validarUsuario(Request $request){
		$correo = $request->input('correo');
		$clave = $request->input('clave');

		$query = DB::table('Usuario')
		->where('usuCorreo',$correo)
		->where('usuClave',md5($clave));

		if($query->count() > 0){
			$data = DB::table('Usuario')->get();
			$config = DB::table('Configuracion')->get();

			foreach($data as $rec){
				Cache::put('idUsuario',$rec->idUsuario,90);
				Cache::put('usuNombre',$rec->usuNombre." ".$rec->usuApellido,90);

				break;
			}

			foreach($config as $c){
				Cache::put('conNombre',$c->conNombre,90);
				Cache::put('tipo',$c->conTipo,90);
				break;
			}


			return "true";
		}else{
			return "false";
		}
	}

	public function cerrarSesion(){
		Cache::forget('idUsuario');
		return $this->index();
	}
}
