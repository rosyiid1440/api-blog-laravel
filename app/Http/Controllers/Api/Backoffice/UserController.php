<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Cache;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        if(Cache::has('user')){
            $data = Cache::get('user');
        }else{
            $data = User::join('role','role.id','users.role_id')
            ->select('users.name','users.username','users.username','users.email','users.created_at','users.updated_at','users.id','role.nama_role')
            ->orderBy('users.name')
            ->get();

            Cache::add('user',$data,10*60);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $cek = User::where('email',$request->email)->first();

        if($cek){
            $res['message'] = 'Email sudah terdaftar !';
            return response()->json($res, 200);
        }else{
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make('12345678');
            $user->role_id = $request->role_id;
            $user->save();

            Cache::flush();
    
            $res['message'] = 'Data berhasil ditambah !';
            return response()->json($res, 200);
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $cek = User::where('id','!=',$id)->where('email',$request->email)->first();

        if($cek){
            $res['message'] = 'Email sudah terdaftar !';
            return response()->json($res, 200);
        }else{
            $user = User::find($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->save();

            Cache::flush();

            $res['message'] = 'Data berhasil diubah !';
            return response()->json($res, 200);
        }
    }

    public function show($id)
    {
        if(Cache::has('user'.$id)){
            $data = Cache::get('user'.$id);
        }else{
            $data = User::join('role','role.id','users.role_id')
            ->select('users.name','users.username','users.username','users.email','users.created_at','users.updated_at','users.id','role.nama_role')
            ->orderBy('users.name')
            ->where('users.id',$id)
            ->first();

            Cache::add('user'.$id,$data,10*60);
        }

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $cek = User::find($id);

        if($cek){
            $cek->delete();
            Cache::flush();
            $res['message'] = 'Data berhasil dihapus !';
            return response()->json($res, 200);
        }else{
            $res['message'] = 'Data tidak ditemukan !';
            return response()->json($res, 200);
        }
    }
}
