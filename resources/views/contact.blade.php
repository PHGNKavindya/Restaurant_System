@extends('layouts.app')

@section('content')


    


    <!-- Contact Section -->
    <section class="contact py-5">
        <div class="container">
            <h1 class="text-center mb-5">Contact Us</h1>
            <div class="row justify-content-center mt-4">
                <!-- Address, Phone, Email -->
                <div class="col-md-6 text-center">
                    <h4>Our Location</h4>
                    <p>No. 23, Highlevel Road, Maharagama</p>
                    <h4>Phone</h4>
                    <p>0112 848825</p>
                    <h4>Email</h4>
                    <p>tastehaven@gmail.com</p>
                </div>
                <br>

                <!-- Video Clip -->
                <div class="row justify-content-center">
                    <!-- YouTube Video Embed -->
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                                title="Restaurant Tour" 
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

   @endsection