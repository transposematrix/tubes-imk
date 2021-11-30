<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\faq;
use App\Models\comment;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class qnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = faq::all();
        return view("website/FAQ", compact('faq'));
    }

    public function list()
    {
        $limit = 5;
        $numberco = comment::count();
        $comment = comment::select('name', 'email', 'comment', 'blog_id', 'created_at')->take($limit)->latest()->get();

        $qna = faq::select('id', 'question', 'answer')->get();
        return view ('admin.qna', compact('numberco', 'comment', 'qna'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        faq::create([
            'question' => request('question'),
            'answer' => request ('answer'),
        ]);

        return redirect('/qna')->with('success', 'QnA has been added'); 
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
        $data = faq::find($id);
        $data->question = $request->question;
        $data->answer = $request->answer;
        $data->save();

        return redirect('/qna')->with('success', 'QnA has been updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = faq::findorFail($id);
        $data->delete();

        return back();

    }
}
