<?php

namespace App\Http\Controllers\Api;

use App\Divida;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DividaController extends Controller
{
    private $divida;

    public function __construct(Divida $divida){
        $this->divida = $divida;
    }
    
    public function list($id){
        try{
            $data = $this->divida::where('devedores_id', $id)->get();
            return response()->json($data, 200);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function store(Request $request){    
        try{
            $dividaData = $request->all();
            $this->divida->create($dividaData);
            return response()->json(201);
        }catch(Exception $e){
            return response()->json($e);
        }
    }
}
