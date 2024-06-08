@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/sign-up.css')}}">

<div class="container">
  <h1 class="mt-4 mb-4">Settings</h1>

  {{-- CONTAINER 1 --}}
  <div class="container bg-transparent p-0 mb-4 rounded container-border">
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

        <div class="container bg-gray" style="width: 100%; display: flex; justify-content: center; padding: 20px 0;">
            <div class="profile-section" style="width: 80%; display: flex; flex-direction: column; align-items: center;">
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success">
                        Profile updated successfully!
                    </div>
                @endif
                <div class="d-flex justify-content-between" style="width: 100%; gap: 20px;">

                    <!-- Profile Picture Section -->
                    <div class="contact-input rounded p-4 text-center" style=" flex: 1;">
                        <div class="rounded-circle mb-3">
                            <img src="{{ asset('assets/images/avatar.png') }}" alt="Profile Picture" class="rounded-circle">
                        </div>
                        <button type="button" class="button-green-gradient">Save Photo
                            <img src="{{ asset('assets/images/arrow-right.svg') }}" style="width: 8px; margin-left: 10px;">
                        </button>
                    </div>

                    <!-- Profile Edit Form -->
                    <div class="contact-input rounded p-4" style=" flex: 1;">
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
                                <select class="form-control bg-black text-white border-0" id="role" name="role">
                                    <option value="Worker" {{ old('role', auth()->user()->role) == 'Worker' ? 'selected' : '' }}>Worker</option>
                                    <option value="Boss" {{ old('role', auth()->user()->role) == 'Boss' ? 'selected' : '' }}>Boss</option>
                                    <option value="Admin" {{ old('role', auth()->user()->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                                </select>
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
                                <button type="submit" class="button-green-gradient">Save Changes
                                    <img src="{{ asset('assets/images/arrow-right.svg') }}" style="width: 8px; margin-left: 10px;">
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Password Update Form -->
                    <div class="contact-input rounded p-4" style=" flex: 1;">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @method('PUT')

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
                                <button type="submit" class="button-green-gradient">Update
                                    <img src="{{ asset('assets/images/arrow-right.svg') }}" style="width: 8px; margin-left: 10px;">
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


@stop