<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\task;
use App\User;
use App\Models\comment;
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
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $task = task::select('detail', 'date', 'start_time', 'date_due', 'time_due')->distinct()->get();
        return view ('admin.task.task', compact('numberco', 'comment', 'task'));
    }

    public function list()
    {
        $id = auth()->user()->id;
        $task = task::select('id', 'user_id', 'detail', 'task', 'keterangan', 'date_due', 'time_due', 'status')->where('user_id', $id)->get();
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
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $task = task::select('id', 'user_id', 'task', 'date', 'start_time', 'date_due', 'time_due', 'collect_date', 'collect_time', 'status')->where('date', $id)->get();
        return view ('admin.task.task-month', compact('numberco', 'comment', 'task'));    
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
        $date_now = Carbon::now()->format('Y-m-d');
        $time_now = Carbon::now()->format('H:i:m'); 
        $task = task::findorFail($id);
        return view('user.submit-task', compact('task', 'date_now', 'time_now'));
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
        $task = task::find($id);
        if ($request->hasFile('file')){
            $file=$request->file;        
            $filename= $file->getClientOriginalName();    
            $request->file->move(public_path('task'),$filename);
    
          } else {
            $filename = $task->task;
          }

        if($request->date < $task->date_due){
            $status= "Submitted on time";
        }
        else if(($request->date <= $task->date_due) AND ($request->time <= $task->time_due)){
            $status = "Submitted on time";
        }
        else if(($request->date == $task->date_due) AND ($request->time >= $task->time_due)){
            $status = "Submitted Late";
        }else if(($request->date > $task->date_due) AND ($request->time <= $task->time_due)){
            $status = "Submitted Late";
        }else if(($request->date > $task->date_due) AND ($request->time > $task->time_due)){
            $status = "Submitted Late";
        }else{
            ///
        }

        $task->task = $filename;
        $task->collect_date = $request->date;
        $task->collect_time = $request->time;
        $task->status = $status;

        $task->save();

        return redirect('/task-user')->with('success', 'Your task has been submitted');

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
