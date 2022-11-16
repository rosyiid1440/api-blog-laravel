<?php

namespace App\Http\Controllers\Api\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostKategori;
use App\Models\Post;
use Validator;
use Cache;
use Str;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        if(Cache::has('backpost'.Auth::user()->id)){
            $data = Cache::get('backpost'.Auth::user()->id);
        }else{
            $posts = Post::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();

            foreach($posts as $item)
            {
                $kategori = PostKategori::join('kategori','kategori.id','post_kategori.kategori_id')
                ->where('post_id',$item->id)
                ->select('kategori.nama_kategori','kategori.id')
                ->get();
    
                $item['kategori'] = $kategori;
                $data[] = $item;
            }

            Cache::add('backpost'.Auth::user()->id,$data,10*60);
        }
        
        return response()->json($data, 200);
    }

    public function show($id)
    {
        if(Cache::has('backpost'.$id.Auth::user()->id)){
            $data = Cache::get('backpost'.$id.Auth::user()->id);

            if($data->user_id != Auth::user()->id){
                $res['message'] = 'Unauthorized !';
                return response()->json($res, 200);
            }
        }else{
            $data = Post::where('id',$id)
            ->where('user_id',Auth::user()->id)
            ->first();

            if($data){
                $kategori = PostKategori::join('kategori','kategori.id','post_kategori.kategori_id')
                ->where('post_id',$data->id)
                ->select('kategori.nama_kategori','kategori.id')
                ->get();
    
                $data['kategori'] = $kategori;
    
                Cache::add('backpost'.$id.Auth::user()->id,$data,10*60);
            }else{
                $res['message'] = 'Unauthorized !';
                return response()->json($res, 200);
            }
        }
        
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'gambar' => 'required',
            'isi' => 'required',
            'status' => 'required',
            'kategori_id.*' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $cek = Post::where('slug',Str::slug($request->judul))->first();

        if($cek){
            $res['message'] = 'Slug sudah ada, silahkan ganti judul !';
            return response()->json($res, 200);
        }

        $data = new Post;
        $data->judul = $request->judul;
        $data->gambar = $request->gambar;
        $data->slug = Str::slug($request->judul);
        $data->isi = $request->isi;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();

        $kategories = $request->get('kategori_id');

        foreach($kategories as $item)
        {
            $postkategori = new PostKategori;
            $postkategori->post_id = $data->id;
            $postkategori->kategori_id = $item;
            $postkategori->save();
        }

        Cache::flush();

        $res['message'] = 'Data berhasil ditambah !';
        return response()->json($res, 200);
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'gambar' => 'required',
            'isi' => 'required',
            'status' => 'required',
            'kategori_id.*' => 'required'
        ]);

        if ($validator->fails()) {
            $respone['errors'] = $validator->errors();

            return response()->json($respone, 201);
        }

        $cek = Post::where('id','!=',$id)->where('slug',Str::slug($request->judul))->first();

        if($cek){
            $res['message'] = 'Slug sudah ada, silahkan ganti judul !';
            return response()->json($res, 200);
        }

        $data = Post::find($id);
        $data->judul = $request->judul;
        $data->gambar = $request->gambar;
        $data->slug = Str::slug($request->judul);
        $data->isi = $request->isi;
        $data->status = $request->status;
        $data->user_id = Auth::user()->id;
        $data->save();
        
        $kategories = $request->get('kategori_id');

        foreach($kategories as $item)
        {
            $cek = PostKategori::where('post_id',$data->id)->where('kategori_id',$item)->first();

            if($cek){

            }else{
                $postkategori = new PostKategori;
                $postkategori->post_id = $data->id;
                $postkategori->kategori_id = $item;
                $postkategori->save();
            }
        }

        $getkategori = PostKategori::where('post_id',$id)->select('kategori_id')->get();

        foreach($getkategori as $val){
            $arrdelete[] = $val->kategori_id;
        }

        $hasilhapus = array_values(array_diff($arrdelete,$kategories));

        PostKategori::whereIn('kategori_id',$hasilhapus)->where('post_id',$id)->delete();

        Cache::flush();

        $res['message'] = 'Data berhasil diubah !';
        return response()->json($res, 200);
    }

    public function destroy($id)
    {
        $cek = Post::find($id);

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
