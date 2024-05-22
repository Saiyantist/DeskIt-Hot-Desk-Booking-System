<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function show(Request $request){
        if($request->user() == null)
            return view('welcome');

        if ($request->user()->hasAnyRole(['superadmin', 'admin', 'officemanager', 'employee']))
        {
            return redirect()->route('dashboard');
        }
        else {
            return view('welcome');
        }
        abort(403, 'Unauthorized');
    }

    public function show1(): View {
        return view('faq');
    }

    public function show2(): View {
        return view('privacyPolicy');
    }

    public function show3(): View {
        return view('guides');
    }

    public function show4(){
        return view('waiting');
    }
}

