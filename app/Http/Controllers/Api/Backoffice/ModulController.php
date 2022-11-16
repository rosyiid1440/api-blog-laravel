<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modul;
use Cache;
use Validator;

class ModulController extends Controller
{
    public function index()
    {
        if(Cache::has('modul')){
            $data = Cache::get('modul');
        }else{
            $data = Modul::orderBy('nama_modul')->get();

            Cache::add('modul', $data, 10*60);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_modul' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $modul = Modul::create($request->all());
        Cache::flush();

        $res['message'] = "Data berhasil ditambah !";
        $res['data'] = $modul;
        return response()->json($res, 200);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_modul' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $modul = Modul::where('id',$id)->update($request->all());
        Cache::flush();

        $res['message'] = "Data berhasil diubah !";
        return response()->json($res, 200);
    }

    public function show($id)
    {
        if(Cache::has('modul'.$id)){
            $data = Cache::get('modul'.$id);
        }else{
            $data = Modul::find($id);

            Cache::add('modul'.$id, $data, 10*60);
        }

        if($data){
            return response()->json($data, 200);
        }else{
            
            $res['message'] = "Not Found !";
            return response()->json($res, 201);
        }
    }

    public function destroy($id)
    {
        Modul::find($id)->delete();

        Cache::flush();

        $res['message'] = "Data berhasil dihapus !";
        return response()->json($res, 200);
    }
}
