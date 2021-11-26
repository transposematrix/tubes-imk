<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.sekretaris.sekretaris-index');
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
