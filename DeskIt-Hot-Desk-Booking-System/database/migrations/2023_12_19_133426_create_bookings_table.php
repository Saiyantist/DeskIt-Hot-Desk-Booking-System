<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); 
            $table->date('booking_date');
            $table->enum('booking_time', ['8:00 am - 7:00 pm', '7:00 pm - 3:00 am'])->nullable();
            $table->enum('status', ['accepted', 'pending', 'canceled']);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('desk_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};