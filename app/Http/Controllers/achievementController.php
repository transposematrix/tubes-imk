<?php

namespace App\Http\Controllers;

use App\Models\achievement;
use App\Models\competition;
use App\Models\comment;
use App\User;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $competition = competition::with('competitions_id');
        return view('admin.achievement', compact('competition'));

        $user = User::with('users_id');
        return view('admin.achievement', compact('user'));
    }

    public function achievementList()
    {
        $noved21s = achievement::where('competitions_id', '1')->get();
        $aurgumentum_open21s = achievement::where('competitions_id', '2')->get();
        $agat21s = achievement::where('competitions_id', '3')->get();
        $usu_open21s = achievement::where('competitions_id', '4')->get();
        $purpose_uph21s = achievement::where('competitions_id', '6')->get();
        $aeo21s = achievement::where('competitions_id', '8')->get();
        $ived21s = achievement::where('competitions_id', '11')->get();
        $melbourne_mini20s = achievement::where('competitions_id', '12')->get();
        $bdrt20s = achievement::where('competitions_id', '13')->get();
        $idea20s = achievement::where('competitions_id', '14')->get();
        $love_comp20s = achievement::where('competitions_id', '15')->get();
        $alsa20s = achievement::where('competitions_id', '21')->get();
        $meme20s = achievement::where('competitions_id', '25')->get();
        $nudc19s = achievement::where('competitions_id', '26')->get();
        $mbpdo19s = achievement::where('competitions_id', '27')->get();
        $seo19s = achievement::where('competitions_id', '28')->get();
        $pro18s = achievement::where('competitions_id', '29')->get();
        $nudc18s = achievement::where('competitions_id', '30')->get();
        $mapdo18s = achievement::where('competitions_id', '31')->get();
        return view("website/achievement", compact('noved21s', 'aurgumentum_open21s', 'agat21s', 'usu_open21s', 'purpose_uph21s', 'aeo21s', 'ived21s', 'melbourne_mini20s', 'bdrt20s', 'idea20s', 'love_comp20s', 'alsa20s', 'meme20s', 'nudc19s', 'mbpdo19s', 'seo19s', 'pro18s', 'nudc18s', 'mapdo18s'));

    }
    public function list()
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $user = user::select('id', 'name')->where('category', '!=', 'alumnee')->get();
        $competition = competition::select('id','competition_name')->get();


        $achievement = achievement::select('id', 'users_id', 'champion_description','competitions_id')->get();
        return view ('admin.achievement', compact('numberco', 'comment', 'achievement','user','competition'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            return view ('admin.tambah-ac');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        achievement::create([
            'users_id' => request('user_id'),
            'competitions_id' => request ('competition'),
            'champion_description' => request('champion_description'),
        ]);

        return redirect('/achievement-admin')->with('success', 'Achievement has been added'); 
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
        $data = achievement::find($id);
        $data->users_id = $request->user_id;
        $data->competitions_id = $request->competition;
        $data->champion_description = $request->champion_description;

        $data->save();

        return redirect('/achievement-admin')->with('success', 'Achievement has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = achievement::findorFail($id);
        $data->delete();

        return back();

    }
}
