<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function show(): View {
        return view('welcome');
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

