<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\organizer;
use App\Models\position;
use App\Models\comment;
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
        $tahun21s = organizer::select('id', 'user_id', 'position', 'period')->where('period', '2021')->get();
        $tahun20s = organizer::select('id', 'user_id', 'position', 'period')->where('period', '2020')->get();
        $tahun19s = organizer::select('id', 'user_id', 'position', 'period')->where('period', '2019')->get();
        return view("website/organizationStructure", compact('tahun21s', 'tahun20s', 'tahun19s'));
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
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $user = user::select('id', 'name')->where('category', '!=', 'alumnee')->orderBy('name', 'ASC')->get();
        $position = position::select('id', 'position_name')->get();
        $organizer = organizer::select('id', 'user_id', 'position', 'period')->get();
        return view ('admin.organizer_list', compact('numberco', 'comment', 'organizer', 'user', 'position'));
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
            'user_id' => 'required',
            'position' => 'required',
            'period' => 'required',
        ]);

        organizer::create([
            'user_id' => request('user_id'),
            'position' => request ('position'),
            'period' => request('period'),
        ]);

        return redirect('/structure')->with('success', 'Organizer has been added'); 
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
//
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
//
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//

    }
}
