<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\report;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = report::select('id', 'creator', 'event', 'perihal',  'tgl_laporan', 'file_laporan', 'tgl_pengesahan')->get();
        return view ('admin.report', compact('reports'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new-report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request,$file)
    {
        return response()->download(public_path('report/'.$file));
    }

    public function store(Request $request)
    {
        request()->validate([
            'creator' => 'required',
            'event' => 'required',
            'perihal' => 'required',
            'file' => 'required',
        ]);

        $data=new report();
   	
        $file=$request->file;        
        $filename= $file->getClientOriginalName();

        $request->file->move(public_path('report'),$filename);
        $data->file_laporan=$filename;

        $data->tgl_laporan=$request->tgl_laporan;
        $data->creator=$request->creator;
        $data->event=$request->event;
        $data->perihal=$request->perihal;
        $data->tgl_pengesahan=$request->tgl_pengesahan;

        $data->save();
        return redirect('/reports')->with('success', 'Report has been added!');
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
        $report = report::findorFail($id);
        return view('admin.update-report', compact('report'));
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
        $report = report::find($id);
        if ($request->hasFile('file')){
            $file=$request->file;        
            $filename= $file->getClientOriginalName();    
            $request->file->move(public_path('report'),$filename);
            $report->file_laporan = $filename;
    
          } else {
            $filename = $report->file_laporan;
          }

          $report->tgl_laporan=$request->tgl_laporan;
          $report->creator=$request->creator;
          $report->event=$request->event;
          $report->perihal=$request->perihal;
          $report->tgl_pengesahan=$request->tgl_pengesahan;
          $report->save();

        return redirect('/reports')->with('success', 'Report has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = report::findorFail($id);
        $data->delete();

        return back();


    }
}