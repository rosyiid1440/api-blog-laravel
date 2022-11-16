<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\RoleHasPermission;
use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Role;
use Validator;
use Cache;

class RoleHasPermissionController extends Controller
{
    public function index()
    {
        if(Cache::has('rolehaspermission')){
            $data = Cache::get('rolehaspermission');
        }else{
            $role = Role::orderBy('nama_role')
            ->select('role.id','role.nama_role')
            ->get();

            foreach($role as $item){
                $rolehaspermission = RoleHasPermission::where('role_id',$item->id)->get();

                $modul = Modul::select('modul.id','modul.nama_modul')->orderBy('nama_modul')->get();

                $hasilmodul = [];
                foreach($modul as $valmodul){
                    $check = false;
                    foreach($rolehaspermission as $valrolehas){
                        if($valmodul->id == $valrolehas->modul_id){
                            $check = true;
                        }
                    }
                    $valmodul['check'] = $check;

                    $hasilmodul[] = $valmodul;
                }

                $item['permission'] = $hasilmodul;
                $data[] = $item;
            }

            Cache::add('rolehaspermission',$data,10*60);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'modul_id' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        RoleHasPermission::create($request->all());

        $res['message'] = "Data berhasil diubah !";
        return response()->json($res, 200);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'modul_id' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        RolehasPermission::where('role_id',$request->role_id)->where('modul_id',$request->modul_id)->delete();

        $res['message'] = "Data berhasil diubah !";
        return response()->json($res, 200);
    }
}
