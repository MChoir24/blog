<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Blog;

class UserController extends Controller
{
    public function __construct()
    {
        $desa = array('1' => 1);
    }

    public function main()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->get()->take(3);
        $visi = DB::table('visi_misi')->first();

        $data = array('blogs' => $blogs,
                        'visi' => $visi);
        return view('blogs/welcome', $data);
    }
    public function berita()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->paginate(3);
        // dd($blogs);
        // return Blog::paginate();

        return view('blogs/berita', ['blogs' => $blogs]);
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }
        return view('blogs/detail',['blog'=>$blog]);
    }

    public function search()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->paginate(3);
        if (!$blogs) {
            abort(404);
        }
        // $blogs->withPath('search/result');
        // dd($blogs->count());
        return view('blogs/search',['blogs'=>$blogs]);
    }

    public function search1(Request $request)
    {
        $blogs = Blog::whereRaw("deskripsi like '%$request->word%' or judul like '%$request->word%'")->orderBy('CREATED_AT','DESC')->paginate(3);
        if (!$blogs) {
            abort(404);
        }
        // dd($blogs->count());
        // return Blog::paginate();
        $blogs->withPath('search/result');
        return view('blogs/search',['blogs'=>$blogs, 'word'=>$request->word]);
    }

    public function iklim()
    {
        $tahun = DB::table('iklim')->select('id')->where('id', 'like', '%01')->orderBy('id','asc')->get(); // ambil tahun
        $table = DB::table('iklim')->orderBy('id','desc')->get(); // get data

        $data = array('iklims' => $table, 'tahun' => $tahun);
        return view('/blogs/profile/iklim',$data);
        // dd($table);
    }

    public function filter_iklim(Request $request)
    {
        $tahun = DB::table('iklim')->select('id')->where('id', 'like', '%01')->orderBy('id','asc')->get(); // ambil tahun
        $table = DB::table('iklim')->where('id','like',$request->tahun.'%')->orderBy('id','desc')->get();
        $data = array('iklims' => $table, 'tahun' => $tahun);
        return view('/blogs/profile/iklim',$data);
    }

    public function geografis()
    {
        $table = DB::table('geografis')->orderBy('id', 'desc')->first();
        $data = array('ha' => $table->luas_ha,
                    'km2' => $table->luas_km2,
                    'tinggi' => $table->tinggi,
                    'batas_utara' => $table->batas_utara,
                    'batas_timur' => $table->batas_timur,
                    'batas_selatan' => $table->batas_selatan,
                    'batas_barat' => $table->batas_barat);
        return view('blogs/profile/geografis', $data);
    }
}
