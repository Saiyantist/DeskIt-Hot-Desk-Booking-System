<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Mockery\Undefined;

class UserController extends Controller
{

    // public function index() {
    //     $users = User::all();
    //     $userArray = $users->toArray();
    //     $userEmail = "garrel123@example.com";
    //     $userPass = "password";
        
    //     dd($userArray);
        // $users->toArray();

        // BOSS Mawe JS
        // const usersLogin = _.find($userArrayrs, {email: $userEmail})
        // return typeOf usersLogin !== Undefined ? "Welocome user"  : "Wrong username and password"; 

    // }




    
    public function index() {
        return view('');
    }

    public function login() {
        
        return view('login');
    }


    public function create(){
        return view('register');
    }

    // public function store(Request $request): RedirectResponse
    // {

    // }
}
