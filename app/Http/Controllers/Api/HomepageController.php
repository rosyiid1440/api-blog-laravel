<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostKategori;
use App\Models\Kategori;
use App\Models\Post;
use Cache;

class HomepageController extends Controller
{
    public function post()
    {   
        if(Cache::has('post')){
            $post = Cache::get('post');
        }else{
            $post = [];
            $posts = Post::join('users','users.id','post.user_id')
            ->select('post.*','users.name')
            ->where('status','publish')
            ->orderBy('id','DESC')
            ->get();

            foreach($posts as $item){
                $kategori = PostKategori::join('kategori','kategori.id','post_kategori.kategori_id')->where('post_id',$item->id)->get();
                $datakategori = [];
                foreach ($kategori as $key => $value) {
                    $datakategori[] = [
                        'slug' => $value->slug,
                        'nama_kategori' => $value->nama_kategori
                    ];
                }

                $item['kategori'] = $datakategori;
                $post[] = $item;
            }

            Cache::add('post', $post, 10*60*60);
        }

        return response()->json($post, 200);
    }

    public function kategori()
    {
        if(Cache::has('kategori')){
            $kategori = Cache::get('kategori');
        }else{
            $kategori = Kategori::orderBy('nama_kategori')->get();

            Cache::add('kategori',$kategori,10*60*60);
        }

        return response()->json($kategori, 200);
    }

    public function show_post($slug)
    {
        if(Cache::has('post'.$slug)){
            $post = Cache::get('post'.$slug);
        }else{
            $posts = Post::join('users','users.id','post.user_id')
            ->select('post.*','users.name')
            ->where('status','publish')
            ->where('post.slug',$slug)
            ->first();

            $kategori = PostKategori::join('kategori','kategori.id','post_kategori.kategori_id')->where('post_id',$posts->id)->get();
            $datakategori = [];
            foreach ($kategori as $key => $value) {
                $datakategori[] = [
                    'slug' => $value->slug,
                    'nama_kategori' => $value->nama_kategori
                ];
            }

            $posts['kategori'] = $datakategori;
            $post = $posts;

            Cache::add('post'.$slug, $post, 10*60);
        }

        return response()->json($post, 200);
    }

    public function show_kategori($slug)
    {
        if(Cache::has('kategori'.$slug)){
            $data = Cache::get('kategori'.$slug);
        }else{
            $post = [];
            $kategori = Kategori::orderBy('nama_kategori')
            ->where('slug',$slug)
            ->first();

            $postkategori = PostKategori::join('post','post.id','post_kategori.post_id')
            ->join('users','users.id','post.user_id')
            ->select('post.*','users.name')
            ->where('kategori_id',$kategori->id)
            ->get();

            foreach($postkategori as $item){
                $kategoris = PostKategori::join('kategori','kategori.id','post_kategori.kategori_id')->where('post_id',$item->id)->get();
                $datakategori = [];
                foreach ($kategoris as $key => $value) {
                    $datakategori[] = [
                        'slug' => $value->slug,
                        'nama_kategori' => $value->nama_kategori
                    ];
                }

                $item['kategori'] = $datakategori;
                $post[] = $item;
            }

            $data = [
                'kategori' => $kategori,
                'post' => $post
            ];

            Cache::add('kategori'.$slug,$data,10*60*60);
        }

        return response()->json($data, 200);
    }

    public function author($username)
    {
        if(Cache::has('author'.$username)){
            $data = Cache::get('author'.$username);
        }else{
            $data = [];
            $posts = Post::join('users','users.id','post.user_id')
            ->select('post.*','users.name')
            ->where('status','publish')
            ->where('users.username',$username)
            ->orderBy('id','DESC')
            ->get();

            foreach($posts as $item){
                $kategori = PostKategori::join('kategori','kategori.id','post_kategori.kategori_id')->where('post_id',$item->id)->get();
                $datakategori = [];
                foreach ($kategori as $key => $value) {
                    $datakategori[] = [
                        'slug' => $value->slug,
                        'nama_kategori' => $value->nama_kategori
                    ];
                }

                $item['kategori'] = $datakategori;
                $data[] = $item;
            }

            Cache::add('author'.$username, $data, 10*60);
        }

        return response()->json($data, 200);
    }
}
