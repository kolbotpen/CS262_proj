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
        
        
        

        <div class="container" style="width: 100%; display: flex; flex-wrap: wrap;">
            <div class="profile-section" style="flex: 1; padding: 10px; box-sizing: border-box;">
                <div class="d-flex flex-column align-items-center">
                    <div class="rounded-circle">
                        <img src="{{ asset('assets/images/avatar.png') }}" alt="Profile Picture" class="rounded-circle" style="width: 100px; height: 100px;">
                    </div>
                    <div class="profile-text mt-2">
                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success">
                                Profile updated successfully!
                            </div>
                        @endif
                        <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                            <!-- Profile Edit Form -->
                            <form method="POST" action="{{ route('profile.update') }}">
                                @csrf
                                @method('PATCH')
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
                                <!-- Stay Logged in -->
                                <div class="second-div-text mb-3 text-start">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="stayLoggedInSwitch" name="stayLoggedInSwitch" {{ auth()->user()->stay_logged_in ? 'checked' : '' }}>
                                        <span class="form-check-label">Stay Logged in</span>
                                    </label>
                                </div>
                                <!-- Email Notification -->
                                <div class="second-div-text mb-3 text-start">
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="emailNotificationSwitch" name="emailNotificationSwitch" {{ auth()->user()->email_notifications ? 'checked' : '' }}>
                                        <span class="form-check-label">Email Notification</span>
                                    </label>
                                </div>
                                <!-- Save Changes Button -->
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="button-green-gradient">Save all changes
                                        <img src="{{ asset('assets/images/arrow-right.svg') }}" style="width:8px; margin-left:10px;">
                                    </button>
                                </div>
                            </form>
                            <!-- Password Update Form -->
                            <form method="POST" action="{{ route('password.update') }}" class="mt-4">
                                @csrf
                                @method('PATCH')
                                <!-- Current Password -->
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">
                                        <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> Current Password
                                    </label>
                                    <input type="password" class="form-control bg-black text-white border-0" id="current_password" name="current_password" placeholder="••••••••" required>
                                    <x-input-error :messages="$errors->get('current_password')" class="mt-2 text-red" />
                                </div>
                                <!-- New Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> New Password
                                    </label>
                                    <input type="password" class="form-control bg-black text-white border-0" id="password" name="password" placeholder="••••••••" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red" />
                                </div>
                                <!-- Confirm New Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> Confirm New Password
                                    </label>
                                    <input type="password" class="form-control bg-black text-white border-0" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red" />
                                </div>
                                <!-- Update Password Button -->
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="button-green-gradient">Update Password
                                        <img src="{{ asset('assets/images/arrow-right.svg') }}" style="width:8px; margin-left:10px;">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        

    </div>
</div>




  
</div>


@stop