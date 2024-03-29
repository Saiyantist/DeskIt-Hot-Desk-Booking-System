<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8d7ba59e72.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../styles/stylesVerification.css">
</head>
<body>

    <?php 
       include "landingNavbar.php"; 
    ?>

    <main>
        <div class="container-lg text-center">

            <div class="row">

                <div class="col">
                    <img id="verification-image" src="../images/verification-image.png" alt="">
                </div>

                <div class="col">
                    <h1>WELCOME!</h1>
                    
                    <form action="POST">
                        <label for="verification"><h2>VERIFICATION</h2></label><br>
                        <input type="text" id="otp-1" name="OTP" maxlength="1">
                        <input type="text" id="otp-2" name="OTP" maxlength="1">
                        <input type="text" id="otp-3" name="OTP" maxlength="1">
                        <input type="text" id="otp-4" name="OTP" maxlength="1">
                        <input type="text" id="otp-5" name="OTP" maxlength="1">
                        <input type="text" id="otp-6" name="OTP" maxlength="1">

                        <h6>PLEASE CHECK YOUR INBOX AND ENTER 6-DIGIT CODE.</h6>

                        <input type="submit" value="VERIFY">
                    </form> <br>


                <div class="footnote">
                    <p>If your organization is already using Deskit but you do not have your own eamil, please contact your administator.</p>
                </div>

                </div>
            </div>

        </div>
        
        
    </main>
    
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