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
        $member = user::select('id', 'name', 'nim', 'faculty', 'photo', 'batch', 'levelAdmin', 'levelUser',  'phone')->where('levelAdmin', '!=', "Master")->where('category', '!=', 'alumnee')->get();
        return view ('admin.active-member', compact('member'));    
    }

    public function alumnee()
    {
        $members = user::select('id', 'name', 'nim', 'faculty', 'levelAdmin', 'levelUser', 'batch', 'photo',  'phone')->where('category', '!=', 'active')->get();
        return view ('admin.alumnee', compact('members'));    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = user::select('id', 'name', 'email', 'nim', 'faculty', 'levelAdmin', 'levelUser')->where('levelUser', '!=', 'admin')->where('category', '!=', 'alumnee')->get();
        $administrator = user::select('id', 'name', 'email', 'nim', 'faculty', 'levelAdmin', 'levelUser', 'batch', 'photo', 'phone')->where('levelUser', '=', "Admin")->get();
        return view('admin.user', compact('administrator', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('user\assets\img\members'), $imageName);

        $data=new User();
   	

        $data->name=$request->name;
        $data->nim=$request->nim;
        $data->faculty = $request->faculty;
        $data->batch=$request->batch;
        $data->category=$request->category;
        $data->levelUser = "user";
        $data->levelAdmin = "user";
        $data->email = NULL;
        $data->password = NULL;
        $data->phone=$request->phone;
        $data->photo = $imageName;

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
    public function storeAdmin(Request $request)
    {
          $id = $request->user_id;
          $data = user::find($id);
          if($request->level == 'master' OR $request->level == 'sekretaris'){
              $data->levelUser = "admin";
          }else{
              $data->levelUser = "user";
          }
          $data->levelAdmin = $request->level;
  
          $data->save();
            return redirect('/users')->with('success', 'Administrator has been Added!');
          
      }

    public function updateAdmin(Request $request, $id)
    {
          $data = user::find($id);
          if($request->level == 'master' OR $request->level == 'sekretaris'){
              $data->levelUser = "admin";
          }else{
              $data->levelUser = "user";
          }
          $data->levelAdmin = $request->level;
  
          $data->save();
            return redirect('/users')->with('success', 'Administrator has been updated!');
          
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

          if ($request->hasFile('gambar')){
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('user\assets\img\members'), $imageName);
          } else {
            $imageName = $data->photo;
          }

          $data->name=$request->name;
          $data->nim=$request->nim;
          $data->faculty = $request->faculty;
          $data->batch=$request->batch;
          $data->category=$request->category;
          $data->levelUser = $request->levelUser;
          $data->levelAdmin = $request->levelAdmin;
          $data->phone=$request->phone;
          $data->photo = $imageName;
  
          $data->save();
          if($request->category == "active"){
              return redirect('/active_member')->with('success', 'Active-member has been Updated!');
          }else{
              return redirect('/alumnee')->with('success', 'Alumnee has been updated!');
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
