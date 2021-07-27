@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-2 order-lg-1 order-md-1 d-flex flex-column justify-content-center">
               <div>
                    <h1 class="font-weight-bold">Every Mind Yearns to Learn</h1>
                    <p class="tex">The new way to learn properly with us!</p>
                    <a href="#about" class="btn btn-primary ">Get Started</a>
               </div>
            </div>
            <div class="col-md-6 order-1 order-lg-2 hero-img">
                <img src="{{ asset('images/hero-img.png') }}" alt="" srcset="">
            </div>
        </div>
    </div>
@endsection
