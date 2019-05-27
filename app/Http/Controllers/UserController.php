<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

class UserController extends Controller
{
    public function main()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->get()->take(3);
        // dd($blogs);

        return view('blogs/welcome', ['blogs' => $blogs]);
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
    public function result()
    {
        // code...
    }
}
