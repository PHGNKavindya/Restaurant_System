@extends('layouts.app')

@section('content')


<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">



<section class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                  <h1>Taste<br> the Joy, <br>Share<br> the Love.</h1>
                  <button class="btn1">More</button>
                </div>
            </div>
        </div>
      </section>

      <section class="product">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-5 m-auto text-center">
                  <h1>What's Trending</h1>
                  <h6 style="color:brown;">Fresh Picks, Hot Flavors!</h6>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-3 text-center">
                  <div class="card border-0 bg-light mb-2">
                    <div class="card-body">
                      <img src="./img/biriyani.jpg" class="img-fluid" alt="">
                    </div>
                  </div>
                  <h6>Chicken Biriyani</h6>
                </div>

                <div class="col-lg-3 text-center">
                  <div class="card border-0 bg-light mb-2">
                    <div class="card-body">
                      <img src="./img/spaghetti.jpg" class="img-fluid" alt="">
                    </div>
                  </div>
                  <h6>Chicken Spaghetti</h6>
                </div>

                <div class="col-lg-3 text-center">
                  <div class="card border-0 bg-light mb-2">
                    <div class="card-body">
                      <img src="./img/burger.jpg" class="img-fluid" alt="">
                    </div>
                  </div>
                  <h6>Beef Burger</h6>
                </div>

                <div class="col-lg-3 text-center">
                  <div class="card border-0 bg-light mb-2">
                    <div class="card-body">
                      <img src="./img/pizza.jpg" class="img-fluid" alt="">
                    </div>
                  </div>
                  <h6>Hawain Pizza</h6>
                </div>
            </div>
        </div>
      </section>

      <section class="product py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                  <h1>Rate Us</h1>
                  <h6 style="color:brown">Your Voice, Our Improvement!</h6>
                </div>
              </div>

              <div class=row>
                <div class="col-lg-9 m-auto">
                  <div class="row">
                    <div class="col-lg-4 py-3">

                      <h6>LOCATION</h6>
                      <P>N0 23, highlevel Road, Maharagama</P>
                  
                      <h6>PHONE</h6>
                      <P>0112 848825</P>
           
                      <h6>EMAIL</h6>
                      <P>tastehaven@gmail.com</P>
                    
                  </div>


                 
                  <form action="{{ route('feedbacksave') }}" method="POST">
  @csrf
  <div class="col-lg-7">
    <div class="row">
      <div class="col-lg-6 py-3">
        <input type="text" name="name" class="form-control bg-light" placeholder="Your Name">
      </div>

      <div class="col-lg-6 py-3">
        <input type="email" name="email" class="form-control bg-light" placeholder="Your Email">
      </div>

      <div class="col-lg-12 py-3">
        <textarea type="text" name="message" class="form-control bg-light" placeholder="Enter Your Feedback" cols="10" rows="5"></textarea>
      </div>

      <div class="col-lg-12 py-3">
        <button type="submit" class="btn1">Submit</button>
      </div>
    </div>
  </div>
</form>

</section>
@endsection