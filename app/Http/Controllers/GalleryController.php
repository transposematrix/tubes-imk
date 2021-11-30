<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\regulartraining;
use App\Models\gathering;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regulartrainings = regulartraining::orderBy('id', 'DESC')->get();
        $gatherings = gathering::all();
        return view("website/regularTraining&Gathering", compact('regulartrainings', 'gatherings'));
    }

    public function list()
    {
        $activity = regulartraining::select('id', 'photo', 'title')->get();
        return view ('admin.activity', compact('activity'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tambah-rg');
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
            'title' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images'), $imageName);

        regulartraining::create([
            'photo'=>$imageName,
            'title' => request('title'),
        ]);        
        return redirect('/regulartraining')->with('success', 'Photo has been added!');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = regulartraining::find($id);
        $data->title = $request->title;

        if ($request->hasFile('photo')){
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $imageName);
          } else {
            $imageName = $data->gambar;
          }
        $data->photo = $imageName;
        $data->save();

        return redirect('/regulartraining')->with('success', 'Photo has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = regulartraining::findorFail($id);
        $data->delete();

        return back();


    }
}
