<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function list()
    {
        $member = user::select('id', 'name', 'nim', 'batch',  'phone')->where('levelAdmin', '!=', "Master")->where('category', '!=', 'alumnee')->get();
        return view ('admin.active-member', compact('member'));    
    }

    public function alumnee()
    {
        $members = user::select('id', 'name', 'nim', 'batch',  'phone')->where('category', '!=', 'active')->get();
        return view ('admin.alumnee', compact('members'));    
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
        request()->validate([
            'name' => 'required',
            'nim' => 'required',
            'batch' => 'required',
            'category' => 'required',
            'phone'=>'required'
        ]);

        $data=new User();
   	

        $data->name=$request->name;
        $data->nim=$request->nim;
        $data->batch=$request->batch;
        $data->category=$request->category;
        $data->levelUser = "user";
        $data->levelAdmin = "user";
        $data->email = NULL;
        $data->password = NULL;
        $data->phone=$request->phone;

        $data->save();
        if($request->category == "active"){
            return redirect('/active_member')->with('success', 'Active-member has been added!');
        }else{
            return redirect('/alumnee')->with('sucess', 'Alumnee has been added');
        }
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
          $data = user::find($id);
          $data->name=$request->name;
          $data->nim=$request->nim;
          $data->batch=$request->batch;
          $data->category=$request->category;
          $data->levelUser = "user";
          $data->levelAdmin = "user";
          $data->phone=$request->phone;
  
          $data->save();
          if($request->category == "active"){
              return redirect('/active_member')->with('success', 'Active-member has been Updated!');
          }else{
              return redirect('/alumnee')->with('sucess', 'Alumnee has been updated!');
          }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = user::findorFail($id);
        $data->delete();

        return back();    }
}
