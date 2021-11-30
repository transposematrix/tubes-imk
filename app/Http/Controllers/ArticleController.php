<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\blog;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ArticleController extends Controller
{
    protected $limit = 3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = blog::paginate($this->limit);
        $sidebars = blog::orderBy('id', 'DESC')->offset(0)->limit(4)->get();
        return view('website/article', compact('articles', 'sidebars'));
    }

    public function articles($id)
    {
        $articles = blog::findOrFail($id);
        $sidebars = blog::orderBy('id', 'DESC')->offset(0)->limit(4)->get();
        return view('website/articleDetails', compact('articles', 'sidebars'));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $articles = blog::where('title', 'like', "%" . $keyword . "%")->paginate(3);
        $sidebars = blog::orderBy('id', 'DESC')->offset(0)->limit(4)->get();
        return view("website/search", compact('articles', 'sidebars'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $articles = blog::select('id', 'title', 'photo', 'excerpt',  'article', 'publicate_date')->get();
        return view ('admin.article', compact('articles'));
    }
    public function create()
    {
        return view('admin.tambah-article');
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
            'sidebar'=> 'required',
            'content' => 'required',
            'description' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('user\assets\img\blog'), $imageName);

        blog::create([
            'title' => request('judul'),
            'sidebar_title' => request('sidebar'),
            'photo'=>$imageName,
            'article' => request ('content'),
            'excerpt' => request('description'),
            'publicate_date'=>date('Y-m-d'),
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
        $articles = blog::findorFail($id);
        return view('admin.update-article', compact('articles'));
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
        $articles =blog::find($id);
        $articles->title = $request->judul;
        if ($request->hasFile('gambar')){
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('user\assets\img\blog'), $imageName);
          } else {
            $imageName = $articles->gambar;
          }
        $articles->photo = $imageName;
        $articles->article = $request->content;
        $articles->description = $request->description;
        $articles->sidebar_title = $request->sidebar;
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
        $articles = blog::findorFail($id);
        $articles->delete();

        return back();


    }
}
