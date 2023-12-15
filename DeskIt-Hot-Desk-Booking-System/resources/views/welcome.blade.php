@extends('layouts.layout')

@section('content')
<main>
    <section id="home" class="first-row page-section">
        <div class="first-info">
            <h5>DESK BOOKING SYSTEM </h5>
            <p>Desk and Meeting Room Booking made <span>easy, fast & affordable.</span></p>
        </div>
        <div class="first-image">
            <img src="../images/image1.png" class="img-fluid">
        </div>
    </section>

    <section class="second-row">
        <div class="second-image">
            <img src="../images/image1.png" class="img-fluid">
        </div>
        <div class="first-info">
            <h5>SCHEDULE IN A ‘SNAP’</h5>
            <p>Simple booking for your hybrid workspace</p>
            <h6>The way we work has changed and Hot desk E-Systems puts you in complete control of your hybrid
                workspace. It can be easily managed to ensure flexible and safe working, however big or small your
                organization</h6>
        </div>

    </section>

    <section class="first-row">
        <div class="third-image">
            <img src="../images/image1.png" class="img-fluid">
        </div>
        <div class="first-info">
            <h5>UP & RUNNING IN MINUTES</h5>
            <p>Easy for everyone</p>
            <h6>Our simple traffic light system gives you instant information on the state of rooms and desks, and our
                reports help you gain greater insight into who and how it’s all working. </h6>
        </div>

    </section>

    <section id="desk-booking" class="second-row page-section">
        <div class="first-info">
            <h5>ELEVATE YOUR WORKSPACE WITH</h5>
            <p>Desk Booking Software</p>
            <h6>Brings you the ultimate solution for seamless desk booking. Whether you’re a forward thinking startup, a
                bustling corporate hub or dynamic coworking space, our Hotdesk Booking Systenm is designed to transform
                the way you manage and optimise your workspace</h6>
        </div>
        <div class="first-image">
            <img src="../images/image1.png" class="img-fluid">
        </div>

    </section>
    <section id="features" class="third-row page-section">
        <div class="third-info">
            <h5>DESIGNED FOR PURPOSE</h5>
            <p>Features to support hybrid working</p>
            <h6>both easy to use as as incredibly feature rich.</h6>
            <h6>Here are just a few to whet your appetite:</h6>
        </div>

        <div class="first-list">
            <ul>
                <li>Quick set up and easy onboarding including floorplan support</li>
                <li>Ease of use and custom reporting</li>
                <li>Easily scalable (bot up and down)</li>
            </ul>
            <ul>
                <li>Mobile and web-based booking </li>
                <li>Device agnostic for room console integration</li>
                <li>Optional health questionnaire prior to booking</li>
            </ul>
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
                <h6>Deskit has been developed from the ground up to be both easy to use as incredibly feature rich.
                </h6>
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

@endsection