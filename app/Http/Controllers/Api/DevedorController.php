<?php

namespace App\Http\Controllers\Api;

use App\Devedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevedorController extends Controller
{
    private $devedor;
    
    public function __construct(Devedor $devedor){
        $this->devedor = $devedor;
    }
    
    public function index()
    {
        try{
            $data = $this->devedor->all();
            return response()->json($data, 200);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function show($id){    
        try{
            $data = $this->devedor::find($id);
            return response()->json($data, 200);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function store(Request $request)
    {
        try{
            $devedorData = $request->all();
            $this->devedor->create($devedorData);
            return response()->json(201);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            if($this->devedor::where('id', $id)->exists()){
                $devedorData = $request->all();
                $devedor = $this->devedor->find($id);
                $devedor->update($devedorData);
                return response()->json(201);
            }
            return response()->json(404);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function delete($id){
        try{
            if($this->devedor::where('id', $id)->exists()){
                $devedor = $this->devedor::find($id);
                $devedor->delete();
                return response()->json(200);
            }
            return response()->json(404);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function find(Request $request)
    {   
        try{
            $resq = $request->input();
            $key = key($resq);
            $value = reset($resq);

            $data = $this->devedor::where($key, $value)->get();
            return response()->json($data,200);
        }catch(Exception $e){
            return response()->json($e);
        }
    }
}
