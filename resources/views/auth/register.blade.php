@extends('layouts.master')

@section('content')
<link href="{{ asset('assets/css/sign-up.css') }}" rel="stylesheet">

<!-- Section 1 -->
<section id="section1" class="py-5">
    <div class="container" style="margin-top: 100px;">
        <!-- CONTACT US BOX | STARTS HERE -->
        <div class="container rounded overflow-hidden">
            <div class="container align-content-center" style="scale: 0.95">
                <div class="row bg-gray pt-5 pe-4 pb-5 ps-4 rounded" style="background: rgba(0, 0, 0, 0.5);">
                    <div class="col-md-12 text-center">
                        <h1 class="display-6 mb-3">Sign Up</h1>
                        <p class="section2-description text-gray mb-4">Welcome aboard!</p>
                    </div>
                    <div class="row g-4 m-auto">
                        <div class="col-md-6 d-flex">
                            <!-- CONTAINER 1 -->
                            <div class="bg-gray pt-4 pe-4 pb-4 ps-4 w-100 rounded"
                                style="border: #383838 1px solid; height: 100%;">
                                <!-- Content for container 1 -->
                                <h4><img class="icon" src="{{ asset('assets/images/icon-signup-regular.svg') }}"
                                        style="filter:opacity(0.4);" draggable="false">Regular Sign Up</h4>
                                <p class="section2-description text-gray" style="font-size: 16px;">Use regular sign up
                                    provided by our service</p>
                                <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                                    <!-- Original Sign Up Form -->
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <!-- Form inputs -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label"><img class="icon"
                                                    src="{{ asset('assets/images/icon-fullname.svg') }}"
                                                    draggable="false"> Full name</label>
                                            <input type="text" class="form-control bg-black text-white border-0"
                                                id="name" name="name" placeholder="John Doe" :value="old('name')"
                                                required autofocus autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label"><img class="icon"
                                                    src="{{ asset('assets/images/icon-email.svg') }}" draggable="false">
                                                Email</label>
                                            <input type="email" class="form-control bg-black text-white border-0"
                                                id="email" name="email" placeholder="johndoe@email.com"
                                                :value="old('email')" required autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label"><img class="icon"
                                                    src="{{ asset('assets/images/icon-password.svg') }}"
                                                    draggable="false"> Password</label>
                                            <input type="password" class="form-control bg-black text-white border-0"
                                                id="password" name="password" placeholder="••••••••" required
                                                autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label"><img class="icon"
                                                    src="{{ asset('assets/images/icon-password-confirm.svg') }}"
                                                    draggable="false"> Confirm Password</label>
                                            <input type="password" class="form-control bg-black text-white border-0"
                                                id="password_confirmation" name="password_confirmation"
                                                placeholder="••••••••" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')"
                                                class="mt-2 text-red" />
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <x-primary-button class="button-green-gradient">Sign up <img
                                                    src="{{ asset('assets/images/arrow-right.svg') }}"
                                                    style="width:8px; margin-left:10px;"></x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <!-- CONTAINER 2 -->
                            <div class="bg-gray pt-4 pe-4 pb-4 ps-4 w-100 rounded"
                                style="border: #383838 1px solid; height: 100%;">
                                <!-- Content for container 2 -->
                                <h4><img class="icon" src="{{ asset('assets/images/icon-signup-thirdparty.svg') }}"
                                        style="filter:opacity(0.4);" draggable="false">Third-Party Sign Up</h4>
                                <p class="section2-description text-gray" style="font-size: 16px;">Use third-party
                                    accounts to sign up</p>
                                <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                                    <!-- Third-party sign up options -->
                                    <div class="d-grid gap-3 mb-3">
                                        <label style="margin-bottom: -10px"><img class="icon"
                                                src="{{ asset('assets/images/icon-user-lock.svg') }}" draggable="false">
                                            Sign up with</label>
                                        <button
                                            class="btn button-gray-social w-100 d-flex align-items-center justify-content-center"
                                            onclick="window.location.href='{{ route('google.redirect') }}'">
                                            <img src="{{ asset('assets/images/icon-social-google.svg') }}" alt="Google"
                                                class="me-2" draggable="false"> Google
                                        </button>
                                        {{-- <button
                                            class="btn button-gray-social w-100 d-flex align-items-center justify-content-center"
                                            onclick="window.location.href='https://www.facebook.com/v2.12/dialog/oauth'">
                                            <img src="{{ asset('assets/images/icon-social-facebook.svg') }}"
                                                alt="Facebook" class="me-2" draggable="false"> Facebook
                                        </button>
                                        <button
                                            class="btn button-gray-social w-100 d-flex align-items-center justify-content-center"
                                            onclick="window.location.href='https://api.twitter.com/oauth/authenticate'">
                                            <img src="{{ asset('assets/images/icon-social-x.svg') }}" alt="X"
                                                class="me-2" draggable="false"> X.com
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- CONTAINER 3 -->
                            <div class="bg-gray pt-3 pe-4 pb-3 ps-4 w-100 rounded" style="border: #383838 1px solid;">
                                <p class="section2-description text-gray text-center mb-0" style="font-size: 16px;">
                                    Already have an account? <a href="{{ route('login') }}" class="text-green"
                                        style="font-size: 16px;">Log in here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT US BOX | ENDS HERE -->

    </div>
</section>


<script src="{{ asset('assets/js/section-fade-in.js') }}"></script>
@stop