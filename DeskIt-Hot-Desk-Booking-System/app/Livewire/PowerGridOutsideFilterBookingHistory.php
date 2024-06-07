<?php

namespace App\Livewire;

use App\Models\Bookings;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use App\Livewire\UserDashboardBooking;
use App\Models\User;
use App\Models\Desk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OutsideFilterUser extends UserDashboardBooking
{
    public bool $showFilters = true;

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }
 
    public function setUp(): array
    {
        return [
            Header::make()
                ->showToggleColumns()
                ->withoutLoading()
                ->showSearchInput(),
 
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }
 
    public function datasource(): ?Builder
    {
        $userId = Auth::id();

        return Bookings::query()
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->leftJoin('desks', 'desks.id', '=', 'bookings.desk_id')
            ->where('bookings.user_id', $userId)
            ->select(
                'bookings.id',
                'bookings.booking_date',
                'desks.desk_num',
                DB::raw('(CASE WHEN desks.id <= 36 THEN 1 ELSE 2 END) as floor')
            );
    }

}
