<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\letter_in;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LetterController extends Controller
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
        $letters = letter_in::select('id', 'tanggal_terima', 'tanggal_surat', 'nomor_surat',  'pengirim', 'klasifikasi', 'perihal', 'lampiran')->get();
        return view ('admin.surat_masuk', compact('numberco', 'comment', 'letters'));    }

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
        return view('admin.tambah_surat_masuk', compact('numberco', 'comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$file)
    {
        return response()->download(public_path('letter/'.$file));
    }

    public function store(Request $request)
    {
        $data=new letter_in();
   	
        $file=$request->file;        
        $filename= $file->getClientOriginalName();

        $request->file->move(public_path('letter'),$filename);
        $data->lampiran=$filename;

        $data->tanggal_terima=$request->tgl_masuk;
        $data->tanggal_surat=$request->tgl_surat;
        $data->nomor_surat=$request->nomor;
        $data->pengirim=$request->pengirim;
        $data->klasifikasi=$request->klasifikasi;
        $data->perihal=$request->perihal;

        $data->save();
        return redirect('/letter_in')->with('success', 'Letter has been added!');
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
        $letter = letter_in::findorFail($id);
        return view('admin.update-surat_masuk', compact('numberco', 'comment', 'letter'));
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
        $letter = letter_in::find($id);
        if ($request->hasFile('file')){
            $file=$request->file;        
            $filename= $file->getClientOriginalName();    
            $request->file->move(public_path('letter'),$filename);
            $letter->lampiran = $filename;
    
          } else {
            $filename = $letter->lampiran;
          }

          $letter->tanggal_terima=$request->tgl_masuk;
          $letter->tanggal_surat=$request->tgl_surat;
          $letter->nomor_surat=$request->nomor;
          $letter->pengirim=$request->pengirim;
          $letter->klasifikasi=$request->klasifikasi;
          $letter->perihal=$request->perihal;
          $letter->save();

        return redirect('/letter_in')->with('success', 'Letter has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = letter_in::findorFail($id);
        $data->delete();

        return back();


    }
}