<?php

namespace App\Http\Controllers;

use App\Models\gathering;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\regulartraining;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GatheringController extends Controller
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

    public function list()
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $gathering = gathering::select('id', 'photo', 'title')->get();
        return view ('admin.gathering', compact('numberco', 'comment', 'gathering'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tambah-g');
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
        $request->photo->move(public_path('user/assets/img/regularTraining&Gathering'), $imageName);

        gathering::create([
            'photo'=>$imageName,
            'title' => request('title'),
        ]);        
        return redirect('/gathering-admin')->with('success', 'Photo has been added!');
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
        $data = gathering::find($id);
        $data->title = $request->title;

        if ($request->hasFile('photo')){
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $imageName);
          } else {
            $imageName = $data->photo;
          }
        $data->photo = $imageName;
        $data->save();

        return redirect('/gathering-admin')->with('success', 'Photo has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = gathering::findorFail($id);
        $data->delete();

        return back();


    }
}
