<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a Home of the Sistem.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

}
