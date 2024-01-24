<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bookings;
use App\Models\Users;
use App\Models\Desk;
use Carbon\Carbon;

class AdminBooking extends Component
{
    public $date;
    public $availableDeskCount;
    public $bookedCount;
    public $notAvailableCount;
    public $floor1Count;
    public $floor1AvailableDeskCount;
    public $floor1BookedCount;
    public $floor1NotAvailableCount;
    public $floor2Count;
    public $floor2AvailableDeskCount;
    public $floor2BookedCount;
    public $floor2NotAvailableCount;


    public $tmpBookings ;
    public $data = [];
    public $showModal = false;
    public $currentIndex;
    
    public function mount()
    {   
         $deskRange = range(1, 35);
         $deskRange2 = range(36, 72);

        $this->availableDeskCount = Desk::count();
        $this->notAvailableCount = Desk::where('status', 'not_available')->count();
        $this->bookedCount = Bookings::where('status', 'accepted')->count();
        $this->floor1Count =  Desk::whereIn('id', $deskRange)->count();
        $this->floor2Count = Desk::whereIn('id', $deskRange2)->count();
        $this->floor1AvailableDeskCount = Desk::whereIn('id', $deskRange)
        ->whereNotIn('status', ['not_available', 'in_use'])
        ->count();

        $this->floor2AvailableDeskCount = Desk::whereIn('id', $deskRange)
        ->whereNotIn('status', ['not_available', 'in_use'])
        ->count();

        $this->floor1BookedCount = Bookings::whereIn('desk_id', $deskRange)
        ->where('status', 'accepted')
        ->count();

        $this->floor2BookedCount = Bookings::whereIn('desk_id', $deskRange2)
        ->where('status', 'accepted')
        ->count();
        $this->floor1NotAvailableCount = Desk::whereIn('id', $deskRange)
        ->where('status', 'not_available')
        ->count();
        $this->floor2NotAvailableCount = Desk::whereIn('id', $deskRange2)
        ->where('status', 'not_available')
        ->count();

        $this->data = [];

        // Fetch data from the database
        $bookings = Bookings::select('id', 'user_id', 'booking_date', 'desk_id', 'status')
            ->with(['user', 'desk'])
            ->get();

        // Transform the data into the desired format
        foreach ($bookings as $booking) {
            $user = $booking->user->name ?? 'N/A';
            $deskNum = $booking->desk->desk_num ?? 'N/A';

            $this->data[] = [
                'Id' => $booking->id,
                'Name' => $user,
                'Date' => date('F j, Y', strtotime($booking->booking_date)),
                'Desk ID' => $deskNum,
                'Status' => $booking->status,
                'Action' => '<a style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',
            ];
        }
    }



    public function openModal($index)
    {
        $this->currentIndex = $index;  // Store the index when modal is opened
        $this->showModal = true;
    }

    public function handleAction()
    {
        // Use $this->currentIndex to perform the action on the specific data item
        $index = $this->currentIndex;

        if (isset($this->data[$index]) && $this->data[$index]['Action'] !== 'canceled') {
            
            // Dummy pa lang ito, should cancel on the Bookings_table     -gelo
            $this->data[$index]['Action'] = 'canceled';
        }

        $this->closeModal();  // Close the modal after handling the action
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;


        return view('livewire.admin-booking');
    }
}
