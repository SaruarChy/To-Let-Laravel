<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_data;
use App\Models\Productdata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductCon;

class UserData extends Controller
{
    //registration
    function register(Request $rq)
    {
        $email = $rq->email;
        $count = User_data::where('email', $email)->count();
        $mg = "Aleady have an account! try Again";
        session()->put('mg', $mg);
        if ($count > 0) {
            session()->put('mg', $mg);
            return view('register');
        } else {
            session()->pull('mg');

            // $rq->validate(
            //     [
            //         'name' => 'required',
            //         'email' => 'required',
            //         'password' => 'required',
            //         'mobile' => 'required'
            //     ]
            // );

            $user = new User_data;
            $user->name = $rq->name;
            $user->email = $rq->email;
            $user->mobile = $rq->mobile;
            $user->password = Hash::make($rq->password);
            $user->save();
            return view('login');
        }
    }

    //Login
    function login(Request $req)
    {
        $data = User_data::where(['email' => $req->email])->first();
        if (!$data || !Hash::check($req->password, $data->password)) {
            $mg = "User name or password did't matched !";
            session()->put('login_mg', $mg);
            return view("login");
        } else {
            session()->pull('login_mg');
            session()->put('user', $data);
            return redirect('home');
        }
    }

    //author data
    static function authordata()
    {
        return session()->get('user');
    }

    //post an ad
    function post(Request $req)
    {
        $req->validate(
            [
                'address' => 'required',
                'num_of_room' => 'required',
                'status' => 'required',
                'category' => 'required',
                'price' => 'required',
                'detail' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $image = $req->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/img');
        $image->move($path, $input['imagename']);
        $img_name =  $input['imagename'];
        $userid = session()->get('user')['id'];
        $post = new Productdata;

        $post->userid = $userid;
        $post->num_of_room = $req->num_of_room;
        $post->address = $req->address;
        $post->category = $req->category;
        $post->image = $img_name;
        $post->price = $req->price;
        $post->status = $req->status;
        $post->detail = $req->detail;
        $post->save();

        return redirect('author');
    }

    //author function
    function author()
    {
        $userid = session()->get('user')['id'];


        $item = DB::table('user_data')
            ->join('productdata', 'user_data.id', '=', 'productdata.userid')
            ->where('user_data.id', $userid)
            ->select('productdata.*')->get();

        return view('author', ['items' => $item]);
    }
    //remove
    function remove($id)
    {
        DB::table('productdata')->where('id', $id)->delete();
        return redirect('author');
    }
    //edit post
    function edit($id)
    {
        $data = Productdata::find($id);
        return view('edit', ['data' => $data]);
    }

    //update
    function update(Request $req)
    {


        $req->validate(
            [
                'address' => 'required',
                'num_of_room' => 'required | integer',
                'status' => 'required',
                'category' => 'required',
                'price' => 'required',
                'detail' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $image = $req->file('image');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('/img');
        $image->move($path, $input['imagename']);
        $img_name =  $input['imagename'];
        $userid = session()->get('user')['id'];
        $post = Productdata::find($req->allid);

        $post->userid = $userid;
        $post->num_of_room = $req->num_of_room;
        $post->address = $req->address;
        $post->category = $req->category;
        $post->image = $img_name;
        $post->price = $req->price;
        $post->status = $req->status;
        $post->detail = $req->detail;
        $post->update();

        return redirect('author');
    }

}
