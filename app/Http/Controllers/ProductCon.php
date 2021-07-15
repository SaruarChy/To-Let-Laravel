<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productdata;
use Illuminate\Support\Facades\DB;

class ProductCon extends Controller
{
    //home
    function home()
    {
        $data =  Productdata::all();
        return view('home', ['data' => $data]);
    }

    //product details
    function detail($id)
    {

        $data =  DB::table('productdata')
            ->join('user_data', 'productdata.userid', '=', 'user_data.id')
            ->where('productdata.id', $id)
            ->select('productdata.*', 'user_data.*')
            ->first();
        return view('detail', ['item' => $data]);
    }

    //search results for products
    function search(Request $req)
    {
        $item = Productdata::where('address', 'like', '%' . $req->search .  '%')->select("productdata.*")->get();
        return view("search", ['data' => $item]);
    }
}
