<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nav</title>

  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../styles/stylesNavbar.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  

</head>

<body>
  <section id="navigation">
    <nav class="navbar sticky-top navbar-expand-lg navbar-custom">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../images/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse justify-content-lg-end px-2" id="navbarSupportedContent">
          <ul class="navbar-nav mb-lg-0 px-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Desk Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
          </ul>

          <a class="navbar-brand login" href="userHome.php">LOGIN</a>
        </div>
      </div>
    </nav>
  </section>
</body>

</html>