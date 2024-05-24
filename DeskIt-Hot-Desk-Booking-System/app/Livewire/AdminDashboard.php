<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bookings;
use Livewire\WithPagination;
use App\Models\Users;
use App\Models\Desk;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class AdminDashboard extends Component
{

    use WithPagination;

    public $perPage = 10;
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

    public $bookingsData = [];
    public $showModal = false;
    public $currentIndex;

    public $date;
    public $min;
    public $max;

    public $autoAccept;

    public function mount()
    {   
        $deskRange = range(1, 36);
        $deskRange2 = range(36, 71);

        $this->availableDeskCount = Desk::where('status', 'in_use')->count();
        $this->notAvailableCount = Desk::where('status', 'not_available')->count();
        $this->bookedCount = Bookings::where('status', 'accepted')->count();

        $this->floor1Count = Desk::whereIn('id', $deskRange)->count();
        $this->floor2Count = Desk::whereIn('id', $deskRange2)->count();

        $this->floor1AvailableDeskCount = Desk::whereIn('id', $deskRange)->where('status', 'in_use')->count();
        $this->floor1NotAvailableCount = Desk::whereIn('id', $deskRange)->where('status', 'not_available')->count();
        $this->floor2AvailableDeskCount = Desk::whereIn('id', $deskRange)->where('status', 'in_use')->count();
        $this->floor2NotAvailableCount = Desk::whereIn('id', $deskRange2)->where('status', 'not_available')->count();

        $this->floor1BookedCount = Bookings::whereIn('desk_id', $deskRange)->where('status', 'accepted')->count();
        $this->floor2BookedCount = Bookings::whereIn('desk_id', $deskRange2)->where('status', 'accepted')->count();

        $this->fetchBookings();
        $this->autoAccept = Config::get('bookings.auto_accept');
    }

    // Toggle for Auto Accepting of New Bookings
    public function toggleAutoAccept()
    {
        // Toggle the autoAccept property
        $this->autoAccept = !$this->autoAccept; 
        $this->updateAutoAccept();
        $this->dispatch('refreshPage');
    }   

    // Configuration process for the Toggle
    public function updateAutoAccept()
    {
        // Update the configuration value
        $config = Config::get('bookings');
        $config['auto_accept'] = $this->autoAccept;
        $configString = '<?php return ' . var_export($config, true) . ';';
        file_put_contents(config_path('bookings.php'), $configString);
    }

    public function fetchBookings()
    {
        $bookings = Bookings::select('id', 'user_id', 'booking_date', 'desk_id', 'status')
            ->with(['user', 'desk'])
            ->get();

        foreach ($bookings as $booking) {
            $user = $booking->user->name ?? 'N/A';
            $deskNum = $booking->desk->desk_num ?? 'N/A';

            $this->bookingsData[] = [
                'Id' => $booking->id,
                'Name' => $user,
                'Date' => date('F j, Y', strtotime($booking->booking_date)),
                'Desk ID' => $deskNum,
                'Status' => $booking->status,
                'Action' => 'canceled',
            ];
        }
    }

    public function handleAction()
    {
        $index = $this->currentIndex;

        if (isset($this->bookingsData[$index]) && $this->bookingsData[$index]['Action'] !== 'canceled') {
            $bookingId = $this->bookingsData[$index]['Id'];
            $booking = Bookings::find($bookingId);

            if ($booking) {
                $booking->update(['status' => 'canceled']);
            }

            $this->bookingsData[$index]['Action'] = 'canceled';
            $this->dispatchBrowserEvent('refreshComponent');
        }

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function openModal($index)
    {
        $this->currentIndex = $index;
        $this->showModal = true;
    }

    public function render()
    {
        $this->max = Carbon::today()->addDays(14)->toDateString();
        $this->min = Carbon::today()->toDateString();

        return view('livewire.admin-dashboard');
    }
}