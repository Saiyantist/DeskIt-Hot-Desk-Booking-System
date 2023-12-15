<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{config('app.name')}}</title>

  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/css/stylesNavbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

</head>

<body>
  <section id="navigation">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/images/logo.png" alt="logo" width="150" height="30"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-end px-2" id="navbarSupportedContent">

          <ul class="navbar-nav mb-lg-0 px-3" id=btn>
            <li class="nav-item">
              <a class="nav-link activ" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#desk-booking">Desk Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features">Features</a>
            </li>
          </ul>

          <a class="navbar-brand login" href="userHome.php">LOGIN</a>
        </div>
      </div>
    </nav>
  </section>
    <script>
      /* Code for changing active  
      link on clicking */ 
      var a =  
          $("#navigation .navbar-nav .navbar-item .nav-link"); 
  
      for (var i = 0; i < a.length; i++) { 
          a[i].addEventListener("click", 
                                function () { 
              var current = document
                  .getElementsByClassName("active"); 
  
              current[0].className = current[0] 
                  .className.replace(" active", ""); 
  
              this.className += " active"; 
          }); 
      } 
  
      /* Code for changing active  
      link on Scrolling */ 
      $(window).scroll(function () { 
          var distance = $(window).scrollTop(); 
          $('.page-section').each(function (i) { 
  
              if ($(this).position().top  
                  <= distance + 250) { 
                    
                      $('.navbar-nav a.active') 
                          .removeClass('active'); 
  
                      $('.navbar-nav a').eq(i) 
                          .addClass('active'); 
              } 
          }); 
      }).scroll(); 

    </script>
</body>

</html>