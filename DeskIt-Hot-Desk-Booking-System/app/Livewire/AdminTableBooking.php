<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
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


final class AdminTableBooking extends PowerGridComponent
{
    public function datasource(): ?Builder
    {
        return Bookings::query()
        ->join('users', 'users.id', '=', 'bookings.user_id')
        ->leftJoin('desks', 'desks.id', '=', 'bookings.desk_id')
        ->select('bookings.id', 'bookings.booking_date', 'bookings.status', 'users.name as name', 'desks.desk_num');
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
            Filter::inputText('status', 'bookings.status')
                ->operators(['contains', 'starts_with', 'ends_with']),
            Filter::inputText('name', 'users.name')
                ->operators(['contains', 'starts_with', 'ends_with']),
        ];
    }


    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name', fn ($dish) => $dish->name)
            ->addColumn('booking_date', function(Bookings $model) {
                return Carbon::parse($model->booking_date)->format('F j, Y');
            }, fn ($dish) => $dish->booking_date)
            ->addColumn('desk_num', fn ($dish) => $dish->desk_num)
            ->addColumn('status', function(Bookings $model) {
                return $model->status;
            }, fn ($dish) => $dish->status)
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

            Column::make('Date', 'booking_date')
                ->searchable()
                ->sortable(),
    

            Column::make('Desk ID', 'desk_num')
                ->searchable()
                ->sortable(),
            
            Column::make('Status', 'status')
                ->searchable()
                ->sortable(),

            Column::action('Action'),
        ];
    }
    
}
