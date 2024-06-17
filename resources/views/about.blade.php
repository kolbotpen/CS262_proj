@extends('layouts.master')
@section('content')

<link href="assets/css/about.css" rel="stylesheet">

<!-- Section 1 -->
<section id="section1" class="py-5">
    <div class="container align-content-center" style="height:600px; margin-top: 60px;">
        <div class="row">
            <div class="col-md-6 mb-4 d-flex flex-column justify-content-center">
                <h6 class="text-center text-green mb-3 bold-300 inter">WHAT WE'RE ALL ABOUT</h6>
                <h1 class="text-green-gradient display-4 text-center"><img class="icon-huge" src="assets/images/icon-about.svg" draggable="false">About Us</h1>
                <p class="text-gray text-center-justify">Unleash peak productivity with <b class="bold">OURDEN!</b><br><br>We empower modern teams to achieve more by automating repetitive tasks and streamlining workflows.  We provide a powerful platform to manage projects, collaborate seamlessly, and gain valuable insights – all designed to help your team reach its full potential.</p>
            </div>
            <div class="col-md-6 justify-content-center align-content-center overflow-hidden pc-hidden">
                <img src="assets/images/fall-cropped.gif" class="img-fluid rounded" style="max-width: 100%; height: auto;" draggable="false">
            </div>            
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="assets/images/arrow-down.svg" class="floating" style="width:25px; filter: brightness(1);">
            </div>
        </div>
    </div>
</section>


<!-- Section 2 -->
<section id="section2" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center text-green mb-4 bold-300 inter">GETTING TO KNOW US</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-6 text-center mb-4">Meet the people behind<br><b>OURDEN</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="section2-description text-gray text-center-justify mb-4">Behind this innovative product is a team of dedicated professionals passionate about technology and productivity. Allow us to introduce the talented individuals who make it all possible.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center text-green mb-5 bold-300 inter">PLEASE APPRECIATE THESE HANDSOME YOUNG MEN</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center mb-4">
                <img src="assets/images/about-visoth.png" class="img-fluid mb-2 rounded img-hover" alt="Image 1">
                <br><br>
                <p class="mb-1">Chansovisoth Wattanak</p>
                <p class="text-gray mb-4 bold-400" style="font-size: 16px;">Front-End Development</p>
                <div class="mb-1"> <!-- Added classes here -->
                    <a href="mailto:cwattanak@paragoniu.edu.kh"><button class="button-gray bounce">Contact<img src="assets/images/arrow-right.svg" style="width:8px; margin-left:10px; filter: brightness(0.4);"></button></a>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="assets/images/about-kolbot.png" class="img-fluid mb-2 rounded img-hover" alt="Image 2">
                <br><br>
                <p class="mb-1">Kolbot Pen</p>
                <p class="text-gray mb-4 bold-400" style="font-size: 16px;">API Integration</p>
                <div class="mb-1"> <!-- Added classes here -->
                    <a href="mailto:kpen@paragoniu.edu.kh"><button class="button-gray bounce">Contact<img src="assets/images/arrow-right.svg" style="width:8px; margin-left:10px; filter: brightness(0.4);"></button></a>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="assets/images/about-ponloe.png" class="img-fluid mb-2 rounded img-hover" alt="Image 3">
                <br><br>
                <p class="mb-1">Soponloe Sovann</p>
                <p class="text-gray mb-4 bold-400" style="font-size: 16px;">Back-End Development</p>
                <div class="mb-1"> <!-- Added classes here -->
                    <a href="mailto:ssovann1@paragoniu.edu.kh"><button class="button-gray bounce">Contact<img src="assets/images/arrow-right.svg" style="width:8px; margin-left:10px; filter: brightness(0.4);"></button></a>
                </div>
            </div>
            
        </div>        
    </div>
</section>


<!-- Section 3 -->
<section id="section3" class="py-5">
    <div class="container align-content-center" style="height:600px;">
        <div class="row">
            <div class="col-md-6 mb-4 d-flex flex-column justify-content-center">
                <h6 class="text-center text-green mb-3 bold-300 inter">WHAT ARE OUR GOALS?</h6>
                <h1 class="text-green-gradient display-4">Our Vision</h1>
                <p class="text-gray text-justify">In a world where efficiency and time management are crucial, we envision a future where mundane tasks are seamlessly automated, freeing up valuable time for innovation and creativity. Our tool is designed to adapt to your unique needs, providing a flexible and user-friendly platform to manage your tasks effortlessly.</p>
            </div>
            <div class="col-md-6 justify-content-center align-content-center overflow-hidden pc-hidden">
                <img src="assets/images/summer1-cropped.gif" class="img-fluid rounded" style="max-width: 100%; height: auto;" draggable="false">
            </div>            
        </div>
    </div>          
</section>

<script src="assets/js/section-fade-in.js"></script>

@stop
