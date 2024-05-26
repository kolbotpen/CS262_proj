@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/sign-up.css')}}">

<div class="container">
  <h1 class="mt-4">Settings</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-gray p-4 mb-4 rounded container-border">
    <div class="table-border rounded" style="overflow: hidden;">
        <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th class="align-middle">My Profile</th>
                    <th class="align-middle"></th>
                    <th class="align-middle"></th>
                </tr>
            </thead>
        </table>
        <table class="table m-0" style="table-layout: fixed; width: 100%;">
            <tbody>
                <tr>
                    <td class="align-middle">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle">
                                <img src="{{ asset('assets/images/avatar.png') }}" alt="Profile Picture" class="rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <div class="profile-text mt-2">
                                <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                                    <!-- Profile Edit Form -->
                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <!-- Full Name -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">
                                                <img class="icon" src="{{ asset('assets/images/icon-fullname.svg') }}" draggable="false"> Full name
                                            </label>
                                            <input type="text" class="form-control bg-black text-white border-0" id="name" name="name" placeholder="John Doe" value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red" />
                                        </div>
                                        <!-- Email -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">
                                                <img class="icon" src="{{ asset('assets/images/icon-email.svg') }}" draggable="false"> Email
                                            </label>
                                            <input type="email" class="form-control bg-black text-white border-0" id="email" name="email" placeholder="johndoe@email.com" value="{{ old('email', auth()->user()->email) }}" required autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red" />
                                        </div>
                                        <!-- Role -->
                                        <div class="mb-3">
                                            <label for="role" class="form-label">
                                                <img class="icon" src="{{ asset('assets/images/icon-role.svg') }}" draggable="false"> Role
                                            </label>
                                            <input type="text" class="form-control bg-black text-white border-0" id="role" name="role" placeholder="Boss" value="{{ old('role', auth()->user()->role) }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex flex-column align-items-center">
                            
                            <!-- Stay Logged in -->
                            <div class="second-div-text mb-3 text-start">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="stayLoggedInSwitch" name="stayLoggedInSwitch">
                                    <span class="form-check-label">Stay Logged in</span>
                                </label>
                            </div>
                            <!-- Email Notification -->
                            <div class="second-div-text mb-3 text-start">
                                <label class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="emailNotificationSwitch" name="emailNotificationSwitch">
                                    <span class="form-check-label">Email Notification</span>
                                </label>
                            </div>
                            
                            <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                                <!-- Password Update Form -->
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> Password
                                        </label>
                                        <input type="password" class="form-control bg-black text-white border-0" id="password" name="password" placeholder="••••••••" required>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red" />
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            <img class="icon" src="{{ asset('assets/images/icon-password-confirm.svg') }}" draggable="false"> Confirm Password
                                        </label>
                                        <input type="password" class="form-control bg-black text-white border-0" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red" />
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <x-primary-button class="button-green-gradient">Save all changes
                                    <img src="{{ asset('assets/images/arrow-right.svg') }}" style="width:8px; margin-left:10px;">
                                </x-primary-button>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>




  
</div>


@stop