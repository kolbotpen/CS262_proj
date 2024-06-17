@extends('layouts.master-workspace')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/browse.css') }}">

<div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-2">
        <a href="#" class="breadcrumb-link">Browse</a>
    </div>
    <h5 class="mb-4">Join a company or create your own!</h5>

    {{-- CONTAINER 1 --}}
    <div class="container bg-transparent p-0 mb-4 rounded container-border">
        <div class="row" id="tabs-container">
            <!-- CREATE BUTTON -->
            <div class="col-md-6 col-12 tab-container">
                <a href="browse-create" class="text-decoration-none delay-link">
                    <div class="image-container p-0 rounded overflow-hidden">
                        <div class="tab image1" id="create-company-tab">
                            <h2 class="mb-0">Create Company</h2>
                            <p>Create your very own company</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- JOIN BUTTON -->
            <div class="col-md-6 col-12 tab-container">
                <a href="browse-search" class="text-decoration-none delay-link">
                    <div class="image-container p-0 rounded overflow-hidden">
                        <div class="tab image2" id="join-company-tab">
                            <h2 class="mb-0">Join Company</h2>
                            <p>Join the workforce!</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const delayLinks = document.querySelectorAll('.delay-link');
    
    delayLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const href = this.getAttribute('href');
            const imageContainer = this.querySelector('.image-container');
            
            // Add class to trigger the animation
            imageContainer.classList.add('boing-animation');
            
            // Wait for the animation to finish
            setTimeout(function() {
                // Remove the animation class to reset the state
                imageContainer.classList.remove('boing-animation');
                // Redirect to the desired link
                window.location.href = href;
            }, 430); // 400ms is the duration of the boing animation
        });
    });
});

</script>

@stop