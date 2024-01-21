<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Auth;
use App\Http\Controllers\BookingController;
use App\Models\Booking as ModelsBooking;
use Carbon\Carbon;
use App\Models\Desk;
use App\Models\Bookings;

use function PHPUnit\Framework\returnValue;

class Booking extends Component
{
    public $date;
    public $floor= "1";
    public $selectedDesk;
    public $bookedDeskIDs = [];

    public $max;
    public $min;
    
    /**
     * 
     * DESK AVAILABILITY 
     * 
     * */

    public function refreshMap() 
    {

        // To run function
        // Check if there is a date and floor selected
        if($this->date && $this->floor){
            $date = $this->date;
            $floor = $this->floor;

            // Access all Bookings
            $tmpBookings = Bookings::all();
            $bookings = [];

            // Get the id, desk_id, and booking_date of all rows in DB bookings_table and store to an array.
            foreach ($tmpBookings as $booking){
                array_push($bookings, [
                    'id' => $booking->id,
                    'desk_id' => $booking->desk_id,
                    'booking_date' => $booking->booking_date
                    ]
                );
            }

            // dd($bookings);
            // dd($bookings[0]['booking_date']);


            $bookedDeskIDs = [];

            // Access each row of $bookings.
            for ($booking = 0; $booking <= count($bookings) - 1 ; $booking++){

                // Access its booking_date
                $bookingDate = $bookings[$booking]['booking_date'];

                // Check if chosen date matches this booking_date
                if ($date == $bookingDate){

                    // If floor is 1, get the desk_id and store it in an array.
                    if($floor == 1){
                        if ($bookings[$booking]['desk_id'] <= 36){
                            array_push($bookedDeskIDs, $bookings[$booking]['desk_id']);
                        }
                    }
                    // If floor is 2, get the desk_id and store it in an array.
                    if($floor == 2){
                        if ($bookings[$booking]['desk_id'] >= 37){
                            array_push($bookedDeskIDs, $bookings[$booking]['desk_id']);
                        }
                    }
                }
            };

            $this->bookedDeskIDs = $bookedDeskIDs;



            // dd($bookedDeskIDs);


            // $desks = Desk::all();
            // dd($desks);

            // $deskz = [];

            // for ($desk = 0; $desk <= count($desks) -1; $desk++){
            //     array_push($deskz, $desks[$desk]['status']);
            // };

            // dd($deskz);



            // foreach ($bookings as $booking){
            //     $bookingDate = $bookings[$booking]['booking_date'];
            //     if ($date == $bookingDate){
            //         dd('gumana');
            //     }
            // };

            // if (in_array($date, $bookingsBookedDates)){
            //     dd('merong booked');
            // }

            // dd($this->date,$this->floor);           // for testing purpose

            // return view('livewire.booking', compact('selected',));
        }
        
        // dd('Ayaw ko nga.');

        // return view('booking.desks');
    }


    public function clickDesk($key)
    {
        $desks = Desk::all();


        // if ($desks[$key]->statuses_id == '1'){
        //     $this->selectedDesk = $desks[$key]->desk_num;
        //     // dd('sige, go.');
        // }
        // else if ($desks[$key]->statuses_id == '2'){
        //     dd('is booked bruh');
        // }
        // else {
        //     dd('sira \'to');
        // }
    }

    public function book()
    {
        /**  
         *  INSERT Validation Logic, if desk is available for booking. 
         */

        $status = "booked";

        Booking::create([
            "booking_date" => $this->date,    /** This whole block doesn't work yet.. */
            "status" => $status,            
            "user_id" => Auth::user(),
            // "desk_id" => 101,
        ]);

        dd($status); 
    }


    public function render()
    {
        $desks = Desk::all();

        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;

        return view('livewire.booking', compact('desks', 'max', 'min'));
    }
}
