<?php

namespace App\Http\Controllers;

use App\Models\UnitTest;
use Illuminate\Http\Request;

class UnitTestsController extends Controller
{

    /**
     * Display a home page for registeration.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('welcome');
    }


    /**
     * Display a listing of the Tests conducted.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$tests = UnitTest::orderby('id','DESC')->paginate(10);
        return view('dashboard', compact('tests'));
    }


}
