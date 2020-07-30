<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RestroController extends Controller
{
    //
    public function index(Request $request) {
        $perPage = 4;
        $skip = 0;
        $index = 1;
        if($request->has('search')) {
        $find = $request->input('search');
        $data = Restaurant::
        where('name', 'like', "%{$find}%")
        ->orWhere('address', 'like', "%{$find}%")
        ->get();
        } else if ($request->has('page') && $request->input('page') > 1) {
            $page = $request->input('page');
            $skip = ($perPage * $page - $perPage) - 1;
            $index = $skip + 2;
        }

        $data = Restaurant::skip($skip)->take($perPage)->get();
        $restaurants = Restaurant::inRandomOrder()->limit(5)->get();
        $total_res = Restaurant::all()->count();

        return view('pages.home')->with(['total_res' => $total_res, 'data' => $data, 'restaurants' => $restaurants, 'index' => $index]);
    }

    public function list() {
        $data = Restaurant::all();
        return view('pages.list')->with('data', $data);
    }

    public function add() {
        return view('pages.add');
    }

    public function store(Request $request) {
       
        $request->validate([
            "restaurant" => 'required',
            "email" => 'required',
            "address" => 'required',
            "image" => 'image|nullable|max:2048',
            "body" => 'required'
        ]);

        // handle file upload
        if($request->hasFile('image')) {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $ext;
        // move upload file
        $path = $request->file('image')->storeAs('public/images/restaurant/', $filenameToStore); 
        } else {
            // default image
            $filenameToStore = "noimage.jpeg";
        } 
        // add record to database
        $res = new Restaurant;
        $res->name = $request->input('restaurant');
        $res->email = $request->input('email');
        $res->address = $request->input('address');
        $res->image = $filenameToStore;
        $res->body = $request->input('body');
        $res->save();

        return redirect('/list')->with('success', 'Restaurant added.');
    }

    public function delete($id) {
        
        $res = Restaurant::find($id);
        $res->delete();

        if($res->image != "noimage.jpeg") {
           Storage::delete('/public/images/restaurant/'.$res->image);
        }

        return redirect('/list')->with('success', 'Restaurant deleted.');
    }

    public function edit($id) {

        $data = Restaurant::find($id);

        return view('pages.edit')->with('data', $data);
    }

    public function update(Request $request, $id) {

        $request->validate([
            "restaurant" => 'required',
            "email" => 'required',
            "address" => 'required',
            "image" => 'nullable|max:2048',
            "body" => 'required'
        ]);

        $res = Restaurant::find($id);
        $res->name = $request->input('restaurant');
        $res->email = $request->input('email');
        $res->address = $request->input('address');
        $res->body = $request->input('body');

        // handle file upload
        if($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $ext;
            // move upload file
            $path = $request->file('image')->storeAs('public/images/restaurant/', $filenameToStore); 
        } else {
            // default image
            $filenameToStore = $res->image;
            } 

        $res->image = $filenameToStore;

        $res->save();

        return redirect('/list')->with('success', 'Restaurant edited.');
    }

    public function register(Request $request) {
        
        $request->validate([
            "name" => 'required',
            "password" => 'required'
        ]);
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login');
    }

    public function login(Request $request) {
        $request->validate([
            "name" => 'required',
            "password" => 'required'
        ]);
        $user = User::where('name', $request->input('name'))->get();
           if (Hash::check($request->input('password'), $user[0]->password)) {
               $request->session()->put('user', $user);
                return redirect('profile');
           }

           return redirect('/login')->with('error', 'Login failed.');
    }

    public function search(Request $request) {
        return "ji";
    }
}
