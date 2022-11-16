<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Validator;
use Cache;
use Str;
use Auth;

class KategoriController extends Controller
{
    public function index()
    {
        if(Cache::has('backkategori')){
            $data = Cache::get('backkategori');
        }else{
            $kategori = Kategori::orderBy('nama_kategori')->get();
            $data = [];
            foreach($kategori as $item){
                $item['human_created_at'] = $item->created_at->format('d F Y');
                $data[] = $item;
            }

            Cache::add('backkategori',$data,10*60);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $cek = Kategori::where('slug',Str::slug($request->nama_kategori))->first();

        if($cek){
            $res['message'] = 'Data sudah ada, silahkan tambahkan data yang lain !';
            return response()->json($res, 200);
        }else{
            $data = new Kategori;
            $data->nama_kategori = $request->nama_kategori;
            $data->slug = Str::slug($request->nama_kategori);
            $data->save();
    
            Cache::flush();

            $res['message'] = 'Data berhasil ditambah !';
            return response()->json($res, 200);
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $cek = Kategori::where('slug',Str::slug($request->nama_kategori))->first();

        if($cek){
            $res['message'] = 'Data sudah ada, silahkan tambahkan data yang lain !';
            return response()->json($res, 200);
        }else{
            $data = Kategori::find($id);
            $data->nama_kategori = $request->nama_kategori;
            $data->slug = Str::slug($request->nama_kategori);
            $data->save();

            Cache::flush();
    
            $res['message'] = 'Data berhasil diubah !';
            return response()->json($res, 200);
        }
    }

    public function show($id)
    {
        if(Cache::has('backkategori'.$id)){
            $data = Cache::get('backkategori'.$id);
        }else{
            $data = Kategori::find($id);
        }

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $cek = Kategori::find($id);

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
