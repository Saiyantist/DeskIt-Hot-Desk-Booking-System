<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/stylesUhome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8d7ba59e72.js" crossorigin="anonymous"></script>


</head>
<body>
    <?php 
        include "loginNavbar.php"; 
    ?>  
    <main>
        <section>
            <div class="head-uHome">
                <h1>Welcome! Let's find the right workspace for you.</h1>
                <a class="book" href="#">Book a desk</a>
                <img src="../images/head-uHome.png" class="img-fluid">
            </div>
        </section>
        <section>
            <div class="myBook-container">
                <div class="my-bookings">
                    <h5>My bookings</h5>
                </div>
                
                <div class="calendar-image">
                <!-- <img src="../images/image1.png" class="img-fluid"> -->
                <?php 
                    include "calendar.php"; 
                ?>  
                </div>
            </div>
        </section>
        <section class="second-row">
            <div class="row-container">
                <div class="first-info">
                    <h4>REAP THE BENEFITS OF EASY, FAST, AND AFFORDABLE</h4>
                    <p>Room booking software for hybrid workspace management</p>
                    <h6>Let’s you connect with colleagues in real-time and enjoy a seamless meeting room booking experience. See instant availability of desks and rooms, and reserve your space wherever and whenver you are.</h6>
                </div>
                <div class="second-image">
                    <img src="../images/image1.png" class="img-fluid">
                </div>
            </div>
            
        </section>
    </main>
    <footer>
        <div class="left-info">
            <div>
                <div class="a">
                    <img src="../images/logo.png" class="img-fluid">
                </div>
                
                <div class="a">
                    <h6>Deskit has been developed from the ground up to be both easy to use as incredibly feature rich. </h6>
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