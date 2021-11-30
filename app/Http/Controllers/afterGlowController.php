<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\afterglow;

class afterGlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noved21s = afterglow::where('competitions_id', '1')->get();
        $aurgumentum_open21s = afterglow::where('competitions_id', '2')->get();
        $mbpdo21s = afterglow::where('competitions_id', '5')->get();
        $savedc21s = afterglow::where('competitions_id', '7')->get();
        $aeo21s = afterglow::where('competitions_id', '8')->get();
        $proams21s = afterglow::where('competitions_id', '9')->get();
        $founder_trophy21s = afterglow::where('competitions_id', '10')->get();
        $ived21s = afterglow::where('competitions_id', '11')->get();
        $idea20s = afterglow::where('competitions_id', '14')->get();
        $love_comp20s = afterglow::where('competitions_id', '15')->get();
        $joved20s = afterglow::where('competitions_id', '16')->get();
        $taces20s = afterglow::where('competitions_id', '17')->get();
        $atma_open20s = afterglow::where('competitions_id', '18')->get();
        $uido20s = afterglow::where('competitions_id', '19')->get();
        $newbies20s = afterglow::where('competitions_id', '20')->get();
        $alsa20s = afterglow::where('competitions_id', '21')->get();
        $aurgumentum20s = afterglow::where('competitions_id', '22')->get();
        $kdmi20s = afterglow::where('competitions_id', '23')->get();
        $nudc20s = afterglow::where('competitions_id', '24')->get();
        return view("website/afterGlow", compact('noved21s', 'aurgumentum_open21s', 'mbpdo21s', 'savedc21s', 'aeo21s', 'proams21s', 'founder_trophy21s', 'ived21s', 'idea20s', 'love_comp20s', 'joved20s', 'taces20s', 'atma_open20s','uido20s', 'newbies20s', 'alsa20s', 'aurgumentum20s', 'kdmi20s', 'nudc20s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
