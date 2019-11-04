@extends('layouts.main')
@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{asset('images/hero_1.jpg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>{{$item['name']}}</h1>
                        <p class="mb-0">{{$item['address']}}</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="mb-4">
                    <div class="slide-one-item home-slider owl-carousel">
                        <div><img src="{{asset($item['image'])}}" alt="Image" class="img-fluid"></div>
                    </div>
                </div>

                <h4 class="h5 mb-4 text-black">Description</h4>
                {{$item['details']}}
            </div>
            <div class="col-lg-3 ml-auto">

                <div class="mb-5">
                    <h3 class="h5 text-black mb-3">Price</h3>
                    <p>{{$item['price']}} $</p>
                    <h3 class="h5 text-black mb-3">Rate</h3>


                    <p class="mb-0">
                        @for($i=0;$i<round($item['rate'],0);$i++)
                        <span class="icon-star text-warning"></span>
                        @endfor
                        @for($i=0;$i<5-round($item['rate'],0);$i++)
                        <span class="icon-star text-secondary"></span>
                        @endfor
                        <span class="review">({{$item['rate_count']}} Reviews)</span>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary">Trending Today</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">

                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Real Estate</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">House with Swimming Pool</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Furniture</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>

                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_4.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Electronics</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">iPhone X gray</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>



            </div>
            <div class="col-lg-6">

                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_1.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Cars &amp; Vehicles</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">Red Luxury Car</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>

                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_2.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Real Estate</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">House with Swimming Pool</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Furniture</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection