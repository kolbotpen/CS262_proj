@extends('layout.master')
@section('content')

<link href="assets/css/login.css" rel="stylesheet">

<!-- Section 1 -->
<section id="section1" class="py-5">
    <div class="container" style="margin-top: 100px;">
        {{-- CONTACT US BOX | STARTS HERE --}}
        <div class="container rounded overflow-hidden">
            
            <div class="container align-content-center" style="scale: 0.95">
                <div class="row bg-gray p-4 rounded" style="background: rgba(0, 0, 0, 0.5);">
                    <div class="col-md-12 text-center">
                        <h1 class="display-6 mb-3">Register</h1>
                        <p class="section2-description text-gray mb-4">Welcome aboard!</p>
                    </div>
                
                    <div class="d-flex flex-wrap gap-4 justify-content-center">
                        
                        {{-- CONTAINER --}}
                        <div class="col-md-5 bg-gray pt-4 pe-4 pb-4 ps-4 rounded" style="border: #383838 1px solid;">
                            <h4><img class="icon" src="assets/images/icon-signup-regular.svg"  style="filter:opacity(0.4);" draggable="false">Regular Sign Up</h4>
                            <p class="section2-description text-gray" style="font-size: 16px;">Use regular login provided by our service</p>
                            <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label"><img class="icon" src="assets/images/icon-email.svg" draggable="false"> Email</label>
                                        <input type="email" class="form-control bg-black text-white border-0" id="email" name="email" placeholder="johndoe@email.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label"><img class="icon" src="assets/images/icon-password.svg" draggable="false"> Password</label>
                                        <input type="password" class="form-control bg-black text-white border-0" id="password" name="password" placeholder="••••••••" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="button-green-gradient">Login <img src="assets/images/arrow-right.svg" style="width:8px; margin-left:10px;"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                
                        {{-- CONTAINER --}}

                        <div class="col-md-5 bg-gray pt-4 pe-4 pb-4 ps-4 rounded" style="border: #383838 1px solid;">
                            <h4><img class="icon" src="assets/images/icon-signup-thirdparty.svg"  style="filter:opacity(0.4);" draggable="false">Regular Sign Up</h4>
                            <p class="section2-description text-gray" style="font-size: 16px;">Use third-party accounts to login</p>
                            <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                                <div class="d-grid gap-3 mb-3">
                                    <label style="margin-bottom: -10px"><img class="icon" src="assets/images/icon-user-lock.svg" draggable="false"> Sign up with</label>
                                    <button class="btn button-gray-social w-100 d-flex align-items-center justify-content-center" onclick="window.location.href='https://accounts.google.com/o/oauth2/auth'">
                                        <img src="assets/images/icon-social-google.svg" alt="Google" class="me-2" draggable="false"> Google
                                    </button>
                                    <button class="btn button-gray-social w-100 d-flex align-items-center justify-content-center" onclick="window.location.href='https://www.facebook.com/v2.12/dialog/oauth'">
                                        <img src="assets/images/icon-social-facebook.svg" alt="Facebook" class="me-2" draggable="false"> Facebook
                                    </button>
                                    <button class="btn button-gray-social w-100 d-flex align-items-center justify-content-center" onclick="window.location.href='https://api.twitter.com/oauth/authenticate'">
                                        <img src="assets/images/icon-social-x.svg" alt="X" class="me-2" draggable="false"> X.com
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-10 bg-gray mt-4 pt-3 pe-4 pb-1 ps-4 rounded" style="border: #383838 1px solid; margin: auto;">
                        <p class="section2-description text-gray text-center" style="font-size: 16px;">Don't have an account? <a href="sign-up" class="text-green" style="font-size: 16px;">Sign up</a>  now!</p>
                    </div>

                </div>
                
            </div>
            
            {{-- CONTACT US BOX | ENDS HERE --}}
        </div>
    </div>
</section>

<script src="assets/js/section-fade-in.js"></script>

@stop
