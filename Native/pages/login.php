<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../stylesLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8d7ba59e72.js" crossorigin="anonymous"></script>

</head>
<body>
  <?php 
      include "landingNavbar.php"; 
    ?>
  <container>
    <div>
      <img src="../images/phone.png" alt="Phone"/>
    </div>
    <div>
      <h1>WELCOME!</h1>
    </div>
    <div>
      <form method="post">
        <div>
          <label for="email">LOGIN</label>
          <input type="text" name="email" id="email" placeholder="Enter Email Address" required
          data-parsley-type="email" data-parsley-trigger="keyup"/>
        </div>
        <p>
        If your organization is already using Deskit but you do not 
        have your own login, please contact your administrator who 
        can invite you.
      </p>
      <div>
        <input type="submit" name="login" value="LOGIN"/>
      </div>
      <p>
      </div>
      <div>
        <p>
        If your organization is already using 
        Deskit but you do not have your own 
        email, please contact your administrator.  
        </p>
      </div>
      </form>
      
  </container>
  <footer>
    <div class="left-info">
        <div>
            <div class="a">
                <img src="../images/logo.png" class="img-fluid">
            </div>
            
            <div class="a">
                <h6>Deskit has been developed from the ground up to be both easy <br> to use as incredibly feature rich. </h6>
            </div>

            <div class="a">
                <a class="navbar-brand book" href="#">Book a demo</a>
            </div>
            

            
        </div>
    </div>
    <div class="right-info">
        <div class="a">
            <a class="navbar-brand aa" href="#">FAQs</a>
            <a class="navbar-brand aa" href="#">Privacy Policy</a>
            <a class="navbar-brand aa" href="#">Guides</a>
        </div>
        
        <div class="b">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin"></i>
        </div>

    </div>
  </footer>
  <section class="copyright">
    <h6>2023 Deskit limited. All rights reserved.</h6>
  </section>
</body>
</html>