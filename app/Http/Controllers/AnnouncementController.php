<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Announcement;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();
        $announcement = announcement::select('id', 'title', 'gambar', 'content', 'created_at')->get();
        return view ('admin.announcement', compact('numberco', 'comment', 'announcement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();
        return view('admin.tambah-pengumuman', compact('numberco', 'comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('images'), $imageName);

        announcement::create([
            'gambar'=>$imageName,
            'title'=>request('judul'),
            'content' => request ('content'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        return redirect('/announcement')->with('success', 'Postingan berhasil ditambahkan!');    

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
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();
        $announcement = announcement::findorFail($id);
        return view('admin.update-pengumuman', compact('numberco', 'comment', 'announcement'));
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
        $announcement = announcement::find($id);
        $announcement->title = $request->judul;
        if ($request->hasFile('gambar')){
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName);
          } else {
            $imageName = $articles->gambar;
          }
        $announcement->gambar = $imageName;
        $announcement->content = $request->content;
        $announcement->updated_at = date('Y-m-d H:i:s');
        $announcement->save();

        return redirect('/announcement')->with('success', 'Announcement has been updated!');   
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = announcement::findorFail($id);
        $announcement->delete();

        return back();    }
}
