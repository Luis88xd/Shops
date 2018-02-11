<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class POSController extends Controller
{
    public function index(){
    	return view("POS/Body");
    }

    public function vistaUsuario(){
    	return view('POS/body');
    }
}
