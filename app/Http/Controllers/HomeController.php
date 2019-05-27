<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin/admin',['blogs'=>$blogs]);
    }
    public function create()
    {
        return view('admin/form_create');
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:5',
            'fileToUpload' => 'required|image|mimes:jpeg,jpg|max:2048'

        ]);
        $image = $request->file('fileToUpload');
        $name=$image->getClientOriginalName();
        $image->move(public_path().'/img/artikel/', $name);
        $data = $name;

        $blog = new Blog;
        $blog->judul = $request->judul;
        $blog->deskripsi = $request->deskripsi;
        $blog->gambar = trim(json_encode($data),'"');
        $blog->save();
        
        return redirect('admin');
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }

        $blog->delete();

        return redirect('admin');
    }

    public function preview($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }
        return view('admin/view',['blog'=>$blog]);
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }
        return view('admin/edit',['blog'=>$blog]);
    }
    public function update(Request $request ,$id)
    {
        $this->validate($request,[
            'judul' => 'required|min:5',
            'deskripsi' => 'required|min:5',
            'fileToUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }

        $image = $request->file('fileToUpload');
        $name=$image->getClientOriginalName();
        $image->move(public_path().'/img/artikel/', $name);
        $data = $name;

        $blog->judul = $request->judul;
        $blog->deskripsi = $request->deskripsi;
        $blog->gambar = trim(json_encode($data),'"');
        $blog->save();
        return redirect('admin');
    }
}
