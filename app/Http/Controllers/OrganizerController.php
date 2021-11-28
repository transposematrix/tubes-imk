<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\organizer;
use App\Models\position;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizerController extends Controller
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

    public function year()
    {
        $no = 1;
        $organizer = organizer::select('period')->distinct()->get();
        return view ('admin.organizer', compact('organizer', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $user = user::select('id', 'name')->get();
        $position = position::select('id', 'position_name');
        $organizer = organizer::select('id', 'name', 'faculty', 'batch',  'photo', 'position', 'period')->get();
        return view ('admin.organizer_list', compact('organizer', 'user', 'position'));
    }
    public function create()
    {
//
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
        $user = user::select('id', 'name')->get();
        $position = position::select('id', 'position_name');
        $organizer = organizer::select('id', 'name', 'faculty', 'batch',  'photo', 'position', 'period')->where('period', '=', $id)->get();
        return view ('admin.organizer_list', compact('organizer', 'user', 'position'));
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
