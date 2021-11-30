<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Absensi;
use App\Models\absensi_assignment;
use App\Models\comment;
use App\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class absensiController extends Controller
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

        $absensi = absensi::select('detail', 'date', 'start_time', 'time_due')->distinct()->get();
        return view ('admin.sekretaris.data-absen', compact('numberco', 'comment','absensi'));
    }
    public function list()
    {
        $id = auth()->user()->id;
        $date_now = Carbon::now()->format('Y-m-d');
        $time_now = Carbon::now()->format('H:i:m'); 
        $absensi = absensi::select('id', 'user_id', 'detail', 'date', 'start_time', 'time_due', 'status')->where('user_id', $id)->get();
        return view ('user.absensi', compact('absensi', 'date_now', 'time_now'));
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
            $data=new absensi();
   	
            $data->user_id=$mem->id;
            $data->detail=$request->detail;
            $data->date=$request->date;
            $data->start_time=$request->start_time;
            $data->time_due = $request->time_due;    
            $data->save();    
        }
        return redirect('/absensi')->with('success', 'Absensi has been added!');

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

        $absensi = absensi::select('id', 'user_id', 'detail', 'date', 'attend_time', 'status')->where('date', $id)->get();
        return view ('admin.sekretaris.absen-month', compact('numberco', 'comment', 'absensi'));
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
          $data = Absensi::find($id);
          $data->status=$request->status;
  
          $data->save();

          return redirect('/absensi')->with('success', 'Absensi has been Updated!');
      }

      public function userUpdate(Request $request, $id)
      {
            $data = Absensi::find($id);
            $data->status=$request->status;
            $data->attend_time = $request->attend_time;    
            $data->save();
  
            return redirect('/absensi-user');
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
