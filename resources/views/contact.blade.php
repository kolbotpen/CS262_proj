@extends('layouts.master')
@section('content')

<link href="assets/css/contact.css" rel="stylesheet">

<!-- Section 1 -->
<section id="section1" class="py-5">
    <div class="container align-content-center" style="height: 600px; margin-top: 60px;">
        <div class="row">
            <div class="col-md-6 mb-4 d-flex flex-column justify-content-center">
                <h6 class="text-center text-green mb-3 bold-300 inter">WE'D LIKE TO HEAR SO MUCH FROM YOU!</h6>
                <h1 class="text-green-gradient display-4 text-center"><img class="icon-huge" src="assets/images/icon-contact.svg" draggable="false">Contact Us</h1>
                <p class="text-gray text-center-justify">We value your feedback and are here to assist you. Please contact our team with the provided email or fill out the contact form on our website.</p>
            </div>
            <div class="col-md-6 justify-content-center align-content-center overflow-hidden pc-hidden">
                <img src="assets/images/summer1-cropped.gif" class="img-fluid rounded" style="max-width: 100%; height: auto;" draggable="false">
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
    <div class="container m-auto">
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center text-green mb-4 bold-300 inter">GETTING TO KNOW US</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-6 text-center mb-4">Find Our Den &<br>Inquire With Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="section2-description text-gray text-center-justify mb-4">Got Concerns? Send us an email!<br>Got Questions? Send us a request!<br>Bored? Come join the Community!</p>
            </div>
        </div>
        <br>
        {{-- CONTACT US BOX | STARTS HERE --}}
        <div class="container rounded overflow-hidden">
            <div class="row mobile-flex-reverse bg-gray">

                {{-- CONTAINER --}}
                <div class="contact-address d-grid col-md-6 bg-green-gradient pt-4 pe-4 pb-0 ps-4">
                    <h4 class="mb-4"><img class="icon" src="assets/images/icon-location.svg" draggable="false">Our Contact Info</h4>
                    <div class="position-relative">
                        <iframe class="map rounded w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d821.6763728300214!2d104.89757006401005!3d11.58239823611108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109517bf7757d23%3A0x965c34888684bf1!2sParagon%20International%20University!5e0!3m2!1sen!2skh!4v1693567890195!5m2!1sen!2skh" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="container-image-address d-flex flex-column justify-content-center align-items-center mt-4">
                        <table class="address table table-borderless">
                            <tr>
                                <td><a>Email</a></td>
                                <td><a href="mailto:support@OURDEN.com">support@OURDEN.com</a></td>
                            </tr>
                            <tr>
                                <td><a>Phone</a></td>
                                <td><a href="tel:+855 12 345 6789">+855 12 345 6789</a></td>
                            </tr>
                            <tr>
                                <td><a>Address</a></td>
                                <td>
                                    <address>St. 315, Boeng Kak 1, Tuol Kork,<br>Phnom Penh, Cambodia, 12151</address>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <hr class="contact-hr">

                {{-- CONTAINER --}}
                <div class="col-md-6 bg-gray pt-4 pe-4 pb-5 ps-4"> 
                    <h4 class="mb-4"><img class="icon" src="assets/images/icon-mail-write.svg" draggable="false">Send your request</h4>
                    <div class="contact-input rounded p-4" style="border: #383838 1px solid;">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label"><img class="icon" src="assets/images/icon-fullname.svg" draggable="false">Full name</label>
                                <input type="text" class="form-control bg-black text-white border-0" id="name" name="name" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><img class="icon" src="assets/images/icon-email.svg" draggable="false">Email</label>
                                <input type="email" class="form-control bg-black text-white border-0" id="email" name="email" placeholder="johndoe@email.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label"><img class="icon" src="assets/images/icon-mail.svg" draggable="false">Message to us</label>
                                <textarea class="form-control bg-black text-white  border-0" id="message" name="message" rows="3" placeholder="Love from Cambodia ❤️" required></textarea>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="button-green-gradient">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            {{-- CONTACT US BOX | ENDS HERE --}}
        </div>
    </div>
</section>

<script src="assets/js/section-fade-in.js"></script>

@stop
