<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view('login');
    }
    public function store(){
       // auth()->attempt(request(['email','password']));
       if(!  auth()->attempt(request(['email','password'])) ){
        return back()->withErrors([
            'message' => 'Email or Password Not correct!!',
        ]);
       }
        return redirect('/posts');
    }

    public function destroy(){
        auth()->logout();
        return redirect('/posts');
    }
}
