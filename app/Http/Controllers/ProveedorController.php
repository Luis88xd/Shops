<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index(){
        $data['menu'] = DB::table('Menu')->where('idGrupo','2')->get();
        return view("Inventario/Proveedores/Body",$data);
    }

    public function agregarProveedor(Request $request){
        $data = array(
            'proNombre'=>$request->input('nombre'),
            'proDireccion'=>$request->input('direccion'),
            'proTelefono'=>$request->input('telefono'),
            'proCorreo'=>$request->input('correo')
        );

        $query = DB::table('Proveedor')->insert($data);

        if($query){
            return $this->listarProveedores();
        }else{
            return "false";
        }
    }

    public function listarProveedores(){
    	$query = DB::table('Proveedor');
    	
        if($query->count() > 0){
            return $query->get();
        }else{
            return "false";
        }
    }

    public function obtenerProveedor(Request $request){
    	$id = $request->input('id');
    	$query = DB::table('Proveedor')->where('idProveedor',$id);

    	if($query->count() > 0){
    		return $query->get();
    	}else{
    		return "false";
    	}
    }

    public function actualizarProveedor(Request $request){
        $id = $request->input('idProveedor');
        $data = array(
            'proNombre'=>$request->input('nombre'),
            'proDireccion'=>$request->input('direccion'),
            'proTelefono'=>$request->input('telefono'),
            'proCorreo'=>$request->input('correo')
        );

        $query = DB::table('Proveedor')->where('idProveedor',$id)->update($data);
        if($query){
            return $this->listarProveedores();
        }else{
            return "false";
        }
    }

    public function eliminarProveedor(Request $request){
    	$id = $request->input('idProveedor');

        $query = DB::table('Proveedor')->where('idProveedor',$id)->delete();

        if($query){
            return $this->listarProveedores();
        }else{
            return "false";
        }
    }
}