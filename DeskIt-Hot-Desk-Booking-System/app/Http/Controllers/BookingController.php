<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Desk;

class BookingController extends Controller
{
    public function show(): View {

        /** Testing with Boss Jehu */
        
        // $today = Carbon::today();
        // $sample = 'tae to';
        // return view('booking.book', compact('today', 'sample'));

        return view('booking.book');
    }
    public function showDesks(): View {

        // GET ALL DESKS FROM THE DATE SELECTED
        // $date = Date::first();
        $desks = Desk::all();
        return view('booking.desks', compact('desks'));
    }
    public function floor1(): View {
        return view('booking.floor1');
    }
    public function floor2(): View {
        return view('booking.floor2');
    }

    public function storeBookingDesk(){

        dd('Ok');
    }


    // public function store(Request $request)
    // {

    //     /**
    //      *  
    //      * Get request.data from user
    //      * 
    //      * 
    //      * booking_date
    //      * desk_id
    //      * user_id
    //      * 
    //      * 
    //      */


    // }


    // public function store(Request $request)
    // {
    //     $applicant = new Applicant();
    //     $applicant->contact_consent = $request->input('contact_consent');
    //     $applicant->document_consent = $request->input('document_consent');
    //     $applicant->fname = $request->input('fname');
    //     $applicant->mname = $request->input('mname');
    //     $applicant->lname = $request->input('lname');
    //     $applicant->applicant_type = $request->input('applicant_type');
    //     $applicant->sex = $request->input('sex');
    //     $applicant->birthdate = $request->input('birthdate');
    //     $applicant->phone_num = $request->input('phone_num');
    //     $applicant->fb_link = $request->input('fb_link');
    //     $applicant->religion = $request->input('religion');
    // }
}
