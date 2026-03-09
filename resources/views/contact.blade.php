@extends('layouts.main')

@section('content')
<div class="container" style="margin-top:100px; max-width:1000px;">

    <!-- Title -->
    <div class="mb-4">
        <h1 class="fw-bold">Contact Us</h1>
        <hr>
    </div>

    <!-- Intro -->
    <p class="lead">
        Have questions or need assistance? Our team is here to help you.
        Reach out to us using the details below or send us a message.
    </p>

    <!-- Contact Info + Form -->
    <div class="row mt-5">

        <!-- Contact Information -->
        <div class="col-md-5 mb-4">
            <h4 class="fw-semibold">Get in Touch</h4>

            <p class="mt-3">
                <strong>Address:</strong><br>
                Surat, Gujarat, India
            </p>

            <p>
                <strong>Phone:</strong><br>
                +91 98765 43210
            </p>

            <p>
                <strong>Email:</strong><br>
                support@rentride.com
            </p>

            <p>
                <strong>Working Hours:</strong><br>
                Mon – Sun: 8:00 AM – 10:00 PM
            </p>
        </div>

        <!-- Contact Form -->
        <div class="col-md-7 mb-4">
            <h4 class="fw-semibold">Send a Message</h4>

            <form>
                <div class="mb-3 mt-3">
                    <label class="form-label">Your Name</label>
                    <input type="text" class="form-control" placeholder="Enter your name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Your Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" rows="4" placeholder="Write your message"></textarea>
                </div>

                <button class="btn btn-yellow mt-2">Send Message</button>
            </form>
        </div>

    </div>

</div>
@endsection