<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productdata;

class ProductCon extends Controller
{
    //home
    function home()
    {
        $data =  Productdata::all();
        return view('home', ['data' => $data]);
    }
}
