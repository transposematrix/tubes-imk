<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\letter_out;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LetteroutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = letter_out::select('id', 'tanggal_surat', 'penerima', 'klasifikasi',  'perihal', 'lampiran', 'no_surat')->get();
        return view ('admin.surat-keluar', compact('letters'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah_surat_keluar');
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
        $data=new letter_out();
   	
        $file=$request->file;        
        $filename= $file->getClientOriginalName();

        $request->file->move(public_path('letter'),$filename);
        $data->lampiran=$filename;

        $data->tanggal_surat=$request->tgl_surat;
        $data->no_surat=$request->nomor;
        $data->penerima=$request->penerima;
        $data->klasifikasi=$request->klasifikasi;
        $data->perihal=$request->perihal;

        $data->save();
        return redirect('/letter_out')->with('success', 'Letter has been added!');
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
        $letter = letter_out::findorFail($id);
        return view('admin.update-surat_keluar', compact('letter'));
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
        $letter = letter_out::find($id);
        if ($request->hasFile('file')){
            $file=$request->file;        
            $filename= $file->getClientOriginalName();    
            $request->file->move(public_path('letter'),$filename);
            $letter->lampiran = $filename;
    
          } else {
            $filename = $letter->lampiran;
          }

          $letter->tanggal_surat=$request->tgl_surat;
          $letter->no_surat=$request->nomor;
          $letter->penerima=$request->penerima;
          $letter->klasifikasi=$request->klasifikasi;
          $letter->perihal=$request->perihal;
          $letter->save();

        return redirect('/letter_out')->with('success', 'Letter has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = letter_out::findorFail($id);
        $data->delete();

        return back();


    }
}