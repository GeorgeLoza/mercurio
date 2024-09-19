<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrpController extends Controller
{
    public function index(){
        
        return view('orp.index');
    }
    public function report($id){
        return view('orp.reporte',['id'=> $id]);
    }
    public function kanban(){
        return view('orp.kanban');
    }
}
