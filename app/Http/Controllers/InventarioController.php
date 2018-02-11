<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index(){
    	// Menu
    	$data['menu'] = DB::table('Menu')->where('idGrupo','2')->get();
    	return view("Inventario/Body",$data);
    }
}
