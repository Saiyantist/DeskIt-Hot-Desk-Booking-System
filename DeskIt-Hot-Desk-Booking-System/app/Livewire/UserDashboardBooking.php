<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Desk;
use Illuminate\Support\Facades\Auth;

final class UserDashboardBooking extends PowerGridComponent
{
    public function datasource(): ?Builder
    {
        $userId = Auth::id();

        return Bookings::query()
            ->join('users', 'users.id', '=', 'bookings.user_id')
            ->leftJoin('desks', 'desks.id', '=', 'bookings.desk_id')
            ->where('bookings.user_id', $userId)
            ->select('bookings.id', 
            'bookings.booking_date', 
            'users.name as name', 
            'users.email as email', 
            'desks.desk_num', 
            DB::raw('(CASE WHEN desks.id <= 36 THEN 1 ELSE 2 END) as floor')
        );
    }
    public function setUp(): array
    {
        $this->showCheckBox();
        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('booking_date', 'bookings.booking_date'),
            Filter::inputText('desk_num', 'desks.desk_num')
                ->operators([ 'contains', 'starts_with', 'ends_with']),
            Filter::inputText('name', 'users.name')
                ->operators(['contains', 'starts_with', 'ends_with']),
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name', fn ($dish) => $dish->name)
            ->addColumn('email')
            ->addColumn('desk_num', fn ($dish) => $dish->desk_num)
            ->addColumn('floor')
            ->addColumn('booking_date', function(Bookings $model) {
                return Carbon::parse($model->booking_date)->format('F j, Y');
            }, fn ($dish) => $dish->booking_date)
            ->addColumn('action');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Email', 'email')
                ->searchable()
                ->sortable(),

            Column::make('Desk #', 'desk_num')
                ->searchable()
                ->sortable(),

            Column::make('Floor #', 'floor')
                ->searchable()
                ->sortable(),

            Column::make('Date', 'booking_date')
                ->searchable()
                ->sortable(),

            Column::action('Action'),
        ];
    }
}
