@extends('layouts.main')
@section('content')

<style>
    .icon-w {
        color: #f89d13 !important
    }

    .icon-s {
        color: #6c757d !important
    }
</style>
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-12">


                <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                        <h1 class="" data-aos="fade-up">Largest Classifieds In The World</h1>
                        <p data-aos="fade-up" data-aos-delay="100">You can buy, sell anything you want.</p>
                    </div>
                </div>

                <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
                    <form method="get" action="{{url('/')}}">
                        <div class="row align-items-center">
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-4">
                                <input name="keywords" type="text" class="form-control rounded" placeholder="What are you looking for?">
                            </div>
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="wrap-icon">
                                    <span class="icon icon-room"></span>
                                    <select class="form-control rounded" name="location_id" id="">
                                        <option value="">All Locations</option>
                                        @foreach($locations as $location)
                                        <option value="{{$location['id']}}">{{$location['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="select-wrap">
                                    <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                    <select class="form-control rounded" name="category_id" id="">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                <input type="submit" class="btn btn-primary btn-block rounded" value="Search">
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="overlap-category mb-5">
            <div class="row align-items-stretch no-gutters">
                @for($i=0;$i<min(6,count($categories));$i++) <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="{{$categories[$i]['icon']}}"></span></span>
                        <span class="caption mb-2 d-block">{{$categories[$i]['name']}}</span>
                        <span class="number">{{$categories[$i]->items()->count()}}</span>
                    </a>
            </div>
            @endfor
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="h5 mb-4 text-black">Featured Ads</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12  block-13">
            <div class="owl-carousel nonloop-block-13">
                @foreach($items as $item)
                <div class="d-block d-md-flex listing vertical">
                    <a href="{{url('items/'.$item['id'])}}" class="img d-block" style="background-image: url('{{$item['image']}}')"></a>
                    <div class="lh-content">
                        <span class="category">{{$item['category']['name']}}</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="{{url('items/'.$item['id'])}}">{{$item['name']}}</a></h3>
                        <address>{{$item['address']}}</address>
                        <p class="mb-0">
                            @for($i=0;$i<round($item['rate'],0);$i++) <span class="icon-star text-warning" data="{{$item['id']}}"></span>
                                @endfor
                                @for($i=0;$i<5-round($item['rate'],0);$i++) <span class="icon-star text-secondary" data="{{$item['id']}}"></span>
                                    @endfor
                                    <span class="review">({{$item['rate_count']}} Reviews)</span>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>
</div>

<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Popular Products</h2>
                <p class="color-black-opacity-5">Lorem Ipsum Dolor Sit Amet</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Car &amp; Vehicles</a>
                        <h2 class="mb-1"><a href="#">Red Luxury Car</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Real Estate</a>
                        <h2 class="mb-1"><a href="#">House with Swimming Pool</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Furniture</a>
                        <h2 class="mb-1"><a href="#">Wooden Chair &amp; Table</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>

            <div class="col-md-6 mb-4 mb-lg-4 col-lg-6">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left" title="Bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Electronics</a>
                        <h2 class="mb-1"><a href="#">iPhone X gray</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-4 mb-lg-4 col-lg-6">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Real Estate</a>
                        <h2 class="mb-1"><a href="#">House with Swimming Pool</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
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
            @foreach($trendings as $t)
            <div class="col-lg-6">
                <div class="d-block d-md-flex listing">
                    <a href="{{url('items/'.$t['id'])}}" class="img d-block" style="background-image: url('{{$t['image']}}')"></a>
                    <div class="lh-content">
                        <span class="category">{{$t['category']['name']}}</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="{{url('items/'.$t['id'])}}">{{$t['name']}}</a></h3>
                        <address>{{$t['address']}}</address>
                        <p class="mb-0">
                            @for($i=0;$i<5;$i++) <span class="icon-star text-{{(($t['rate']<$i+1)?'secondary':'warning')}}"></span>
                                @endfor
                                <span class="review">({{$t['rate_count']}} Reviews)</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>

<div class="site-section bg-white">
    <div class="container">

        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Testimonials</h2>
            </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-3">
                        <p>John Smith</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Christine Aguilar</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_4.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Robert Spears</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Bruce Rogers</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
</div>



<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Our Blog</h2>
                <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
            </div>
        </div>
        <div class="row mb-3 align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>

            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-primary rounded py-2 px-4 text-white">View All Posts</a>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">    
    $(function() {
        $('.icon-star').hover(function() {
            $(this).prevAll('.icon-star').toggleClass('icon-w');
            $(this).toggleClass('icon-w');
            $(this).nextAll('.icon-star').toggleClass('icon-s');
        });        
        $('.icon-star').click(function() {
            var self = $(this);            
            var rate = $(this).prevAll('.icon-star').length + 1;
            var item_id = $(this).attr('data');
            var data = {
                'rate': rate,
                'item_id': item_id,
                '_token': '{{csrf_token()}}'
            }
            $.ajax({
                type: "POST",
                url: "{{url('items/rate')}}",
                data: data,
                success: function(data) {
                    self.unbind();
                    self.prevAll('.icon-star').unbind();
                    self.nextAll('.icon-star').unbind();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection