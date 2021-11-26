<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\task;
use App\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = task::select('detail', 'date', 'start_time', 'date_due', 'time_due')->distinct()->get();
        return view ('admin.task.task', compact('task'));
    }

    public function list()
    {
        $id = auth()->user()->id;
        $task = task::select('id', 'user_id', 'detail', 'keterangan', 'date_due', 'time_due', 'status')->where('user_id', $id)->get();
        return view ('user.task', compact('task'));
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
        $member = user::select('id')->where('levelUser', '!=', "admin")->where('category', '!=', 'alumnee')->get();

 //       $count = DB::table('users')->count();

        foreach($member as $mem){
            $data=new task();
   	
            $data->user_id=$mem->id;
            $data->detail=$request->title;
            $data->keterangan = $request->about;
            $data->date=$request->date;
            $data->start_time=$request->start_time;
            $data->date_due = $request->due_date;
            $data->time_due = $request->time_due;    
            $data->save();    
        }
        return redirect('/task')->with('success', 'Task has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = task::select('id', 'user_id', 'task', 'date', 'start_time', 'date_due', 'time_due', 'collect_date', 'collect_time', 'status')->where('date', $id)->get();
        return view ('admin.task.task-month', compact('task'));    
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('task/'.$file));
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
