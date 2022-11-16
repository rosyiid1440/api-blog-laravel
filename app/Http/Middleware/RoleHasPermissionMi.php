<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleHasPermission;
use Auth;

class RoleHasPermissionMi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$modul)
    {
        $permission = RoleHasPermission::join('modul','modul.id','role_has_permission.modul_id')
        ->select('modul.nama_modul')
        ->where('role_id',Auth::user()->role_id)
        ->get();

        $status = 'false';
        foreach($permission as $item){
            if(strtolower($item->nama_modul) == $modul){
                $status = 'true';
            }
        }

        if($status == 'false'){
            $res['message'] = 'Unauthorized !';
            return response()->json($res, 200);
        }

        return $next($request);
    }
}
