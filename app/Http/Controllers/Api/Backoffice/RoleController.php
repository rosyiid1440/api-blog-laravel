<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Validator;
use Cache;

class RoleController extends Controller
{
    public function index()
    {
        if(Cache::has('role')){
            $data = Cache::get('role');
        }else{
            $data = Role::orderBy('nama_role')->get();

            Cache::add('role', $data, 10*60);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_role' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $modul = Role::create($request->all());
        Cache::flush();

        $res['message'] = "Data berhasil ditambah !";
        $res['data'] = $modul;
        return response()->json($res, 200);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_role' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $modul = Role::where('id',$id)->update($request->all());
        Cache::flush();

        $res['message'] = "Data berhasil diubah !";
        return response()->json($res, 200);
    }

    public function show($id)
    {
        if(Cache::has('role'.$id)){
            $data = Cache::get('role'.$id);
        }else{
            $data = Role::find($id);

            Cache::add('role'.$id, $data, 10*60);
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
        Role::find($id)->delete();

        Cache::flush();

        $res['message'] = "Data berhasil dihapus !";
        return response()->json($res, 200);
    }
}
