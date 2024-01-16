<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'laravel')}}</title>
    <link rel="stylesheet" href="/css/stylesBooking.css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/8d7ba59e72.js" crossorigin="anonymous"></script>
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<body>

    <section class="container">
        <form method="POST" action="">
          @csrf
          <div class="col-12" >
            <div class="input-group date">
              <input  {{--name="datepicker"--}}
              type="date" class="form-control bg-warning text-light text-center" id="datepicker"
              wire:model="date"
              />
              {{-- <span class="input-group-append" >
                <span class="input-group-text bg-light d-block">
                  <i class="fa fa-calendar"></i>
                </span>
              </span> --}}
            </div>
          </div>
        </form>
      </section>
    <script>

      /** attempted to restrict choosing past dates
       * 
       *  solution:
       *  validation logic sa book() function on the Booking.php of livewire, which will throw an error sa UI.
       */

      // var today = new Date().toISOString().split('T')[0];
      // document.getElementsByName("datepicker")[0].setAttribute('min', today);


      // $(document).ready(function(){
      //   $('#datepicker').datepicker({minDate: 0});
      // });
      
      // attempted to set wire:model date's value to value of input
      // document.addEventListener('livewire:initialized', function (){
      // let component;
      // console.log(component.date)
      // component.set('date') = date;
      // });
    </script>

</body>

</html>