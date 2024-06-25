<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Bookings;
use Livewire\WithPagination;

use App\Models\User;
use App\Models\Desk;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use Illuminate\Support\Facades\Auth;
use function Livewire\once;

//notification
use App\Notifications\AdminToggleNotification;
use App\Notifications\AcceptBookingNotification;
use App\Notifications\DeclineBookingNotification;
use App\Notifications\AcceptBookingEmail;
use App\Notifications\DeclineBookingEmail;
class AdminDashboard extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $totalBookings;
    public $newBookings;
    public $floor1Bookings;
    public $floor1AvailableDesk;
    public $floor1NotAvailable;
    public $bookedDeskIdsFloor1;
    public $bookedDeskIdsFloor2;

    public $floor2Bookings;
    public $floor2AvailableDesk;
    public $floor2NotAvailable;

    public $bookingsData = [];
    public $showModal = false;
    public $currentIndex;
    
    public $autoAccept;
    public $alterBooking;

    public $date;
    public $min;
    public $max;
    public $message;

    public $hasPendingBookings = false;

    public $currentMonth;
    public $currentDay;
    public $currentWeek;
    public $currentTime;
    public $currentMeridiem;

    public function mount()
    {   
        $deskRange = range(1, 36);
        $deskRange2 = range(37, 72);

        $this->totalBookings = Bookings::where('status', 'accepted')->count() ?: 0;
        $this->newBookings = Bookings::where('status', 'accepted')->whereDate('created_at', Carbon::today())->count() ?: 0;

        $this->floor1Bookings = Bookings::whereIn('desk_id', $deskRange)->whereDate('booking_date', Carbon::today())->count() ?: 0;
        $this->floor2Bookings = Bookings::whereIn('desk_id', $deskRange2)->whereDate('booking_date', Carbon::today())->count() ?: 0;

        $this->bookedDeskIdsFloor1 = Bookings::whereIn('desk_id', $deskRange)->where('status', 'accepted')->whereDate('booking_date', Carbon::today())->pluck('desk_id')->toArray();
        $this->bookedDeskIdsFloor2 = Bookings::whereIn('desk_id', $deskRange2)->where('status', 'accepted')->whereDate('booking_date', Carbon::today())->pluck('desk_id')->toArray();
        
        $this->floor1AvailableDesk = count($deskRange) - count($this->bookedDeskIdsFloor1);
        $this->floor2AvailableDesk = count($deskRange2) - count($this->bookedDeskIdsFloor2);
        
        $this->floor1NotAvailable = Bookings::whereIn('desk_id', $deskRange)->where('status', 'not_available')->count();
        $this->floor2NotAvailable = Bookings::whereIn('desk_id', $deskRange2)->where('status', 'not_available')->count();
 
        $this->fetchBookings();

        $this->autoAccept = Config::get('bookings.auto_accept');
        $this->checkAndNotifyPendingBookings();

        
        date_default_timezone_set('Asia/Manila'); 
        $this->currentMonth = Carbon::now()->format('F');
        $this->currentDay = Carbon::now()->format('d');
        $this->currentWeek = Carbon::now()->format('l');
        $this->currentTime = Carbon::now()->format('h:i A');

    }

    public function checkAndNotifyPendingBookings()
    {
        // Check if there are any pending bookings
        $countPendingBookings = Bookings::where('status', 'pending')->count();

        if ($countPendingBookings > 0) {
            $adminUser = Auth::user();
            
            // Check user roles
            $rolesToCheck = ['admin', 'superadmin'];
            $userRoles = $adminUser->roles->pluck('name')->intersect($rolesToCheck);
            
            // If user has roles 'admin' or 'superadmin'
            if ($userRoles->isNotEmpty()) {
                $rolesString = $userRoles->implode(', ');
                $adminUser->notify(new AdminToggleNotification($rolesString));
            }
        } else {
            // No pending bookings, do nothing or handle accordingly
        }
    }

    // Toggle for Auto Accepting of New Bookings
    public function toggleAutoAccept()
    {
        // Toggle the autoAccept property
        $this->autoAccept = !$this->autoAccept; 
        $this->updateAutoAccept();
        $this->dispatch('refreshPage');
        
        
    }   

    // Configuration process for the Toggle Auto Accept Functionality
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


    public function acceptBooking()
    {
        if ($this->alterBooking->status === 'pending') {
            // Update the booking status
            $this->alterBooking->update([
                'status' => 'accepted',
            ]);
    
            // Get the user associated with the booking
            $user = $this->alterBooking->user;
    
            // For reserved desk status
            if ($user->prefersNotification('reserved_desk_status_db')) {
                $user->notify(new AcceptBookingNotification('employee'));
            }
            if ($user->prefersNotification('reserved_desk_status_email')) {
                $booking = new Bookings();
                $user->notify(new AcceptBookingEmail($booking));
            }
    
            // Dispatch the refreshPage event
            $this->dispatch('refreshPage');
        }
    }

    public function declineBooking()
    {
        // if($this->alterBooking->status ===  'accepted' ){
        if($this->alterBooking->status === 'pending' ){
            $this->alterBooking->update([
                'status' => 'canceled',
            ]);

            // Get the user associated with the booking
            $user = $this->alterBooking->user;
    // For reserved desk status
            if ($user->prefersNotification('reserved_desk_status_db')) {
                $user->notify(new DeclineBookingNotification('employee'));
            }
            if ($user->prefersNotification('reserved_desk_status_email')) {
                $booking = new Bookings();
                $user->notify(new DeclineBookingEmail($booking));
            }
            
            $this->dispatch('refreshPage');
        }
    }

    public function saveId($id)
    {
        $this->alterBooking = Bookings::with(['user','desk'])->find($id);

        // Check if there are any pending bookings
        $bookings = Bookings::where('status', 'pending')
        ->where('created_at', '>=', Carbon::now()->subDay())
        ->get();
        
        if ($bookings) {
            $adminUser = Auth::user();
            //check role
            $rolesToCheck = ['admin', 'superadmin'];
            $userRoles = $adminUser->roles->pluck('name')->intersect($rolesToCheck);
            $rolesString = $userRoles->implode(', ');
            $adminUser->notify(new AdminToggleNotification($rolesString));
        }        
    }

    public function resetEditData() {
        $this->reset(
            'alterBooking',
        );
    }

    public function render()
    {
        $this->max = Carbon::today()->addDays(14)->toDateString();
        $this->min = Carbon::today()->toDateString();

        return view('livewire.admin-dashboard');
    }
}