<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public $myval = "";

    //Constructor
    //MyController() in java
    function __construct()
    {
       
    }

    function index()
    {
        return view('html101');
    }


    function info(Request $req)
    {
        return view('myview.info');
    }

    function calculate(Request $req)
    {
        //echo $req->input('mynumber');
        $data['num'] = $req->input('mynumber');
        return view('myview.calculate', $data);
    }

    function store(Request $req)
    {
       $data['fname'] = $req->input('fname');
       $data['lname'] = $req->input('lname');
       $data['dob'] = $req->input('dob');
       $data['age'] = $req->input('age');
       $data['gender'] = $req->input('gender');
       $data['file'] = $req->input('file');
       $data['address'] = $req->input('address');
       $data['color'] = $req->input('color');
       $data['music'] = $req->input('music');
       return view('myview.html_view', $data);
    }
}
