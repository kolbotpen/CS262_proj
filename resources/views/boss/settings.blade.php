@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/settings.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/sign-up.css')}}">

<div class="container">
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Settings</a>
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        <img class="me-2" src="{{asset ('assets/images/icon-checkmark-green.svg')}}">Picture updated successfully!
    </div>
    @endif

    @if (session('status') === 'profile-updated')
    <div class="alert alert-success">
        <img class="me-2" src="{{asset ('assets/images/icon-checkmark-green.svg')}}">Profile updated successfully!
    </div>
    @endif

    @if (session('status') == 'password-updated')
    <div class="alert alert-success">
        <img class="me-2" src="{{asset ('assets/images/icon-checkmark-green.svg')}}">Password updated successfully!
    </div>
    @endif

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 mb-4 rounded container-border">
        <div class="table-container table-border rounded mb-5">
            <table class="table-company-name table m-0" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <th class="align-middle">My Profile</th>
                    </tr>
                </thead>
            </table>

            <div class="container bg-gray" style="width: 100%; display: flex; justify-content: center;">
                <div class="profile-section" style="width: 80%; display: flex; flex-direction: column; align-items: center;">
                    <div class="profile-content d-flex flex-wrap pt-3" style="width: 100%; gap: 20px;">

                        <!-- LEFT | Profile Picture Section -->
                        <div class="contact-input rounded mt-1 p-0 text-center profile-box d-flex align-items-center justify-content-center" style="width: 100%;">
                            <div class="position-relative">
                                <form id="profile-picture-form" method="POST" action="{{ route('profile.updatePicture') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="profile-picture-container rounded-circle bounce-profile-click">
                                        <!-- Update Picture Button -->
                                        <label for="profile-image" class="btn-change-profile" role="button">
                                            <img id="profile-img" src="{{ auth()->user()->profile_picture }}" alt="Profile Picture" class="img-fluid mb-3">
                                        </label>
                                        <input type="file" id="profile-image" class="d-none" name="profile_picture">
                                    </div>
                                    <!-- Save Changes Button -->
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-secondary" role="button">
                                            <img class="icon me-2" src="{{ asset('assets/images/icon-save.svg') }}" draggable="false">Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <!-- MIDDLE | Profile Edit Form -->
                        <div class="contact-input rounded p-2 profile-box" style="width: 100%;">
                            <form id="profile-form" method="POST" action="{{ route('profile.update') }}">
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
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-secondary" role="button">
                                        <img class="icon me-2" src="{{ asset('assets/images/icon-save.svg') }}" draggable="false">Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- RIGHT | Password Update Form -->
                        <div class="contact-input rounded p-2 profile-box" style="width: 100%;">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('PUT')

                                <!-- Current Password -->
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">
                                        <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> Current Password
                                    </label>
                                    <x-text-input id="current_password" class="form-control bg-black text-white border-0" type="password" name="current_password" placeholder="••••••••" required />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red" />
                                </div>

                                <!-- New Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> New Password
                                    </label>
                                    <x-text-input id="password" class="form-control bg-black text-white border-0" type="password" name="password" placeholder="••••••••" required />
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red" />
                                </div>

                                <!-- Confirm New Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <img class="icon" src="{{ asset('assets/images/icon-password.svg') }}" draggable="false"> Confirm New Password
                                    </label>
                                    <x-text-input id="password_confirmation" class="form-control bg-black text-white border-0" type="password" name="password_confirmation" placeholder="••••••••" required />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red" />
                                </div>

                                <!-- Save Changes Button -->
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-secondary" role="button">
                                        <img class="icon me-2" src="{{ asset('assets/images/icon-save.svg') }}" draggable="false">Save Changes
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

<script>
    // Profile picture change functionality
    const profileImageInput = document.getElementById('profile-image');
    const profileImage = document.getElementById('profile-img');

    profileImageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@stop
