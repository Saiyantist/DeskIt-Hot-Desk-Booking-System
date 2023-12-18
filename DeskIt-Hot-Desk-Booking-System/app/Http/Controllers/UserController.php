<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Mockery\Undefined;

class UserController extends Controller
{

    public function index() {
        $users = User::all();
        $userArray = $users->toArray();
        $userEmail = "garrel123@example.com";
        $userPass = "password";
        
        dd($userArray);
        // $users->toArray();

        // BOSS Mawe JS
        // const usersLogin = _.find($userArrayrs, {email: $userEmail})
        // return typeOf usersLogin !== Undefined ? "Welocome user"  : "Wrong username and password"; 



        // dd($users->toArray());
        // dd($users->email);

        // $emails = $users->email;


        // if (in_array($userEmail, $emails)) {
        //     echo "opo.";
        // }
        // else {
        //     echo "wala po. $users";
        // }


        


        return view('test');
    }




    
    // public function index() {
    //     return view('');
    // }

    // public function login(Request $request) {
        
    //     return view('login');
    // }


    // public function create(){
    //     return view('register');
    // }

    // public function store(Request $request){
    //     $request->validate(
    //         [
    //             'firstname' => 'required',
    //             'lastname' => 'required',
    //             'email' => 'required|email',
    //             'password' => 'required' 
    //         ]
    //         );
    // }
}
