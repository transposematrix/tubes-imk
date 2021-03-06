<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Matter;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MatterController extends Controller
{
    protected $limit = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = Matter::paginate($this->limit);
        return view('website/matterView', compact('file'));
    }

    public function default()
    {
        return view ('website/matter');
    }
    public function list()
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $matters = Matter::select('id', 'title', 'gambar', 'description',  'matter', 'created_at')->get();
        return view ('admin.matter', compact('numberco', 'comment', 'matters'));
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

        return view('admin.tambah_matter', compact('numberco', 'comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$file)
    {
        return response()->download(public_path('matter/'.$file));
    }

    public function store(Request $request)
    {
        $data=new Matter();
   	
        $file=$request->file;        
        $filename= $file->getClientOriginalName();

        $request->file->move(public_path('matter'),$filename);
        $data->matter=$filename;

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('user/assets/img/matter'), $imageName);

        $data->title=$request->judul;
        $data->description=$request->description;
        $data->gambar = $imageName;

        $data->save();
        return redirect('/all_matter')->with('success', 'Matter has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $data = Matter::find($id);
        return view('website/matterDetails', compact('numberco', 'comment', 'data'));
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

        $matters = Matter::findorFail($id);
        return view('admin.update-matter', compact('numberco', 'comment', 'matters'));
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
        $matters = Matter::find($id);
        $matters->title = $request->judul;
        if ($request->hasFile('file')){
            $file=$request->file;        
            $filename= $file->getClientOriginalName();    
            $request->file->move(public_path('matter'),$filename);
    
          } else {
            $filename = $matters->matter;
          }

        if ($request->hasFile('gambar')){
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('user/assets/img/matter'), $imageName);
          } else {
            $imageName = $matters->gambar;
          }
        $matters->matter = $filename;
        $matters->gambar = $imageName;
        $matters->description = $request->description;
        $matters->updated_at = date('Y-m-d H:i:s');
        $matters->save();

        return redirect('/all_matter')->with('success', 'Matter has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matters = matter::findorFail($id);
        $matters->delete();

        return back();


    }
}
