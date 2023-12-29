
//============DRAFT============//

if (requested_booking_date is in DB's bookings_table_booking_date_column)
{
    /** 
	    get that/those rows and store in an multi-dimensional array
        then check if the requested desk is currently booked for that date.
    */

	e.g. one item is this:

	dataFetched = [
		"booking_id" => 387412,
		"booking_date" => the selected booking date,
		"status" => 'approved'
		"user_id" => '0023',
		"desk_id" => '103'
		], [...], [...]

    if (requested_desk_id is in any of those data item)
     {
        /** ABORT BOOKING process. */
     }


     /** this means the desk is avaialable for the said date and proceeds to booking logic. */
     elseif (requested_desk is NOT in any of those item)
     {
	    /** BOOKING logic. */
     }
}

//============DRAFT============//



//============CURRENT============//

// $bookings = DB::table('bookings')->pluck('booking_date','desk_id');

$requested_desk_id = '101'
$requested_booking_date = '2023-12-30'

$bookedSameDate = DB::table('bookings')->where('booking_date', $requested_booking_date)->pluck('booking_date', desk_id')
/**  ^^                                                              
*    ||  If the requested_booking_date is inside the database..  
*        Store the desk_id/s in a list.
*/ 

======TO BE CONTINUED======

if (!is_null($bookedSameDate))
{
    // sample data:
    // $booked = [ "2023-12-30" => "102", "2023-12-30"" => "131", "2023-12-30" => "101"]

    /** Check if the desk is booked */
    if (in_array($requested_desk_id, $booked))
     {
        /** ABORT BOOKING process. */
     }

     /** this means the desk is avaialable for the said date and proceeds to booking logic. */
     elseif (requested_desk is NOT in any of those item)
     {
	    /** BOOKING logic. */
     }

     else
     {
        echo "an Unwanted error"
     }
}

//============CURRENT============//




