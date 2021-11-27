<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\letter_in;
use App\Models\letter_out;
use App\Models\report;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function userHome()
    {
        return view('user.index');
    }
    public function halamanketua()
    {
        return view('halaman1');
    }
    public function halamansekretaris()
    {
        $letter_in = letter_in::count();
        $letter_out = letter_out::count();
        $report = report::count();
        $member = User::where('category', '!=', 'alumnee')->count();
        return view('admin.sekretaris.sekretaris-index', compact('letter_in', 'letter_out', 'report', 'member'));
    }
    public function halamanbendahara()
    {
        return view('halaman3');
    }
    public function halamanmaster()
    {
        return view('admin.index');
    }
}
