@extends('layouts.master')
@section('content')

<link href="{{ asset('assets/css/landing.css') }}" rel="stylesheet">

<!-- Section 1: Task Automation & Workflow Management Tool -->
<section id="section1" style="position: relative; overflow: hidden;">

    <div class="container align-content-center">
        <div class="row align-items-center">
            <img src="{{ asset('assets/images/logo1.svg') }}" alt="logo1" class="logo1-left floating" draggable="false">
            <div class="section1-textbox col-md-7 text-md-start">
                <img src="{{ asset('assets/images/logo1.svg') }}" alt="logo1" class="logo1-top floating" draggable="false">
                <h6 class="text-center text-green mb-4 bold-300 inter">WELCOME, NEWCOMER!</h6>
                <h1 class="section1-title1 text-green-gradient text-nowrap">Task Automation&nbsp;&</h1>
                <h1 class="section1-title2 text-blue-gradient text-nowrap">Workflow Mgmt.&nbsp;Tool</h1>
                <p class="text-center text-gray">Unleash peak productivity with <b class="bold">OURDEN</b>. Automate tasks &
                    streamline workflows. Built for modern teams to achieve more.</p>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <a href="login"><button class="button-get-started button-gray bounce">Get Started<img src="{{ asset('assets/images/arrow-right.svg') }}" style="width:8px; margin-left:10px; filter: brightness(0.4);"></button></a>
                    </div>
                </div>
            </div>
            <svg class="svg-background" viewBox="0 0 400 200" preserveAspectRatio="xMidYMid meet">
                <rect class="rounded-square1" x="50%" y="20%" width="15" height="15" rx="3" ry="3" fill="rgba(83, 83, 83, 0.1)" />
                <rect class="rounded-square2" x="58%" y="60%" width="25" height="25" rx="4" ry="4" fill="rgba(83, 83, 83, 0.28)" />
                <rect class="rounded-square3" x="13%" y="53%" width="18" height="18" rx="3" ry="3" fill="rgba(83, 83, 83, 0.1)" />
            </svg>
            
            
            
        </div>
    </div>

    <!-- NEWS TICKER -->
    <div class="news-ticker news-ticker-rl text-right" style="color: #ffffff01; margin-top: -160px;">
        <span class="news-ticker-text">WELCOME TO OURDEN - A TASK AUTOMATION AND WORKFLOW MANAGEMENT TOOL</span><span class="news-ticker-text">WELCOME TO OURDEN - A TASK AUTOMATION AND WORKFLOW MANAGEMENT TOOL</span>
    </div>
    <div class="news-ticker news-ticker-lr" style="color: #ffffff02; margin-top: -80px;">
        <span class="news-ticker-text">WELCOME TO OURDEN - A TASK AUTOMATION AND WORKFLOW MANAGEMENT TOOL</span><span class="news-ticker-text">WELCOME TO OURDEN - A TASK AUTOMATION AND WORKFLOW MANAGEMENT TOOL</span>
    </div>
    <div class="news-ticker news-ticker-rl text-right" style="color: #ffffff04;">
        <span class="news-ticker-text">WELCOME TO OURDEN - A TASK AUTOMATION AND WORKFLOW MANAGEMENT TOOL</span><span class="news-ticker-text">WELCOME TO OURDEN - A TASK AUTOMATION AND WORKFLOW MANAGEMENT TOOL</span>
    </div>
    
    <div class="container p-4 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ asset('assets/images/arrow-down.svg') }}" class="floating" style="width:25px; filter: brightness(1);">
            </div>
        </div>
    </div>
</section>


<!-- Section 3 -->
<section id="section3" class="py-5">
    <div class="container align-content-center" style="height:600px;">
        <div class="row">
            <div class="col-md-6 mb-4 d-flex flex-column justify-content-center">
                <h6 class="text-center text-green mb-3 bold-300 inter">PERKS & FEATURES</h6>
                <h1 class="text-green-gradient display-4">Automate Tasks &<img class="icon-huge ms-4" style="transform: scale(1.1);" src="assets/images/icon-landing-workflow.svg" draggable="false"><br>Streamline Workflows</h1>
                <p class="text-gray text-justify"><b class="bold">OURDEN</b> is your best solution for boosting productivity and performance. Our platform simplifies processes, reduces manual effort, and integrates seamlessly with existing systems. Experience efficient workflows with ease.</p>
            </div>
            <div class="col-md-6 justify-content-center align-content-center overflow-hidden pc-hidden">
                <img src="{{ asset('assets/images/summer1-cropped.gif') }}" class="img-fluid rounded" style="max-width: 100%; height: auto;" draggable="false">
            </div>            
        </div>
    </div>          
</section>


<!-- Section 2 -->
<section id="section2" class="py-5">
    <div class="container align-content-center">
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center text-green mb-3 bold-300 inter">SUMMARY</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-6 text-center mb-4">Grow your self-serve<br>capacity with a support forum</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="section2-description text-gray text-center-justify mb-4"><b class="bold">OURDEN</b> boosts productivity by automating tasks, streamlining workflows with an intuitive interface, and integrating seamlessly with existing systems. Enjoy customizable templates, real-time analytics, and robust security, ensuring efficient and secure operations for all your business needs.</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center text-green mb-5 bold-300 inter">SCREENSHOTS</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('assets/images/landing-screenshot1.png') }}" class="img-fluid mb-2 rounded img-hover" alt="Image 1">
                <br><br>
                <p class="mb-0">Incredible Task Management System</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('assets/images/landing-screenshot2.png') }}" class="img-fluid mb-2 rounded img-hover" alt="Image 2">
                <br><br>
                <p class="mb-0">Tasks in Calendar View</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('assets/images/landing-screenshot3.png') }}" class="img-fluid mb-2 rounded img-hover" alt="Image 3">
                <br><br>
                <p class="mb-0">Profile Customization</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-4">
                <a href="about"><button class="button-get-started button-gray bounce">Learn more<img src="{{ asset('assets/images/arrow-right.svg') }}" style="width:8px; margin-left:10px; filter: brightness(0.4);"></button></a>
            </div>
        </div>
    </div>
</section>


<script src="{{ asset('assets/js/section-fade-in.js') }}"></script>
<script src="{{ asset('assets/js/rounded-squares.js') }}"></script>

@stop
