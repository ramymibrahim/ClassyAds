@extends('layouts.main')
@section('content')

<div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-12">


                <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                        <h1 class="" data-aos="fade-up">Contact US</h1>


                        <form action="{{url('/contact')}}" method="post">
                            @csrf
                            <input name="name" placeholder="Name" class="form-control" required />
                            <input type="email" name="email" placeholder="Email" class="form-control" required />
                            <textarea placeholder="Message...." name="message" required class="form-control"></textarea>
                            <button class="btn btn-success">Send Email</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection