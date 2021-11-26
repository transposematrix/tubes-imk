<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Article;
use App\Models\Kategori;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $articles = article::select('id', 'title', 'gambar', 'description',  'kategori_id', 'created_at')->get();
        return view ('admin.article', compact('articles'));
    }
    public function create()
    {
        $kategoris = kategori::select('id', 'kategori')->get();
        return view ('admin.tambah-article', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required',
            'content' => 'required',
            'description' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $imageName);

        article::create([
            'title' => request('judul'),
            'gambar'=>$imageName,
            'content' => request ('content'),
            'description' => request('description'),
            'kategori_id' => request('kategori'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/all_article')->with('success', 'Postingan berhasil ditambahkan!'); 
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = Kategori::select('id', 'kategori')->get();
        $articles = Article::findorFail($id);
        return view('admin.update-article', compact('kategoris', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles = Article::find($id);
        $articles->title = $request->judul;
        if ($request->hasFile('gambar')){
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName);
          } else {
            $imageName = $articles->gambar;
          }
        $articles->gambar = $imageName;
        $articles->content = $request->content;
        $articles->description = $request->description;
        $articles->kategori_id = $request->kategori;
        $articles->updated_at = date('Y-m-d H:i:s');
        $articles->save();

        return redirect('/all_article')->with('success', 'Article has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = article::findorFail($id);
        $articles->delete();

        return back();


    }
}
