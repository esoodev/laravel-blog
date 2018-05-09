@extends('layouts.app') @section('content')
<!-- Hero Section-->
<section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1>Poing Magazine</h1>
                <a href="/magazine" class="hero-link">Read Magazines</a>
            </div>
        </div>
        <a href=".intro" class="continue link-scroll">
            <i class="fa fa-long-arrow-down"></i> Scroll Down</a>
    </div>
</section>
<!-- Intro Section-->
<!-- <section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="h3">Food for Thought</h2>
                <p class="text-big">Your
                    <strong>best</strong> source of
                    <strong>energy</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderi.</p>
            </div>
        </div>
    </div>
</section> -->
<!-- Latest Posts -->
<section class="latest-posts">
    <div class="container">
        <header>
            <h2>Fresh Out the Oven</h2>
            <p class="text-big">Take a bite of the hottest pies baked by Poing!</p>
        </header>
        <div class="row">
            @foreach($magazine_latests as $latest)
            <div class="post col-md-4">
                <!-- <div class="post-thumbnail">
                    <a href="post.html">
                        <img src="img/blog-1.jpg" alt="..." class="img-fluid">
                    </a>
                </div> -->
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date">{{ $latest->created_at->format('d M | Y') }}</div>
                        <div class="category">
                            <a href="#">{{ $latest->category->name }}</a>
                        </div>
                    </div>
                    <a href="/magazine/{{ $latest->id }}">
                        <h3 class="h4">{{ $latest->title }}</h3>
                    </a>
                    <p class="text-muted">{{ $latest->content_lead }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Divider Section-->
<section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua</h2>
                <a href="#" class="hero-link">View More</a>
            </div>
        </div>
    </div>
</section>
<!-- Featured Section-->
<section class="featured-posts">
    <div class="container">
        <header>
            <h2>In the Pantry</h2>
            <p class="text-big">Cold Pizzas are still good!</p>
        </header>
        <!-- Random Posts-->
        @foreach($magazine_rands as $rand)
        @if($loop->iteration%2)
        @include('index-featured-right',  ['magazine' => $rand])
        @else
        @include('index-featured-left', ['magazine' => $rand])
        @endif
        @endforeach
    </div>
</section>
<!-- Gallery Section-->
<section class="gallery no-padding">
    <div class="row">
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-1.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-1.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-2.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-2.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-3.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-3.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="mix col-lg-3 col-md-3 col-sm-6">
            <div class="item">
                <a href="img/gallery-4.jpg" data-fancybox="gallery" class="image">
                    <img src="img/gallery-4.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center">
                        <i class="icon-search"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Page Footer-->
<footer class="main-footer">
    <!-- <div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="logo">
            <h6 class="text-white">Bootstrap Blog</h6>
        </div>
        <div class="contact-details">
            <p>53 Broadway, Broklyn, NY 11249</p>
            <p>Phone: (020) 123 456 789</p>
            <p>Email: <a href="mailto:info@company.com">Info@Company.com</a></p>
            <ul class="social-menu">
            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-behance"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
        </div>
        <div class="col-md-4">
        <div class="menus d-flex">
            <ul class="list-unstyled">
            <li> <a href="#">My Account</a></li>
            <li> <a href="#">Add Listing</a></li>
            <li> <a href="#">Pricing</a></li>
            <li> <a href="#">Privacy &amp; Policy</a></li>
            </ul>
            <ul class="list-unstyled">
            <li> <a href="#">Our Partners</a></li>
            <li> <a href="#">FAQ</a></li>
            <li> <a href="#">How It Works</a></li>
            <li> <a href="#">Contact</a></li>
            </ul>
        </div>
        </div>
        <div class="col-md-4">
        <div class="latest-posts"><a href="#">
            <div class="post d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Hotels for all budgets</strong><span class="date last-meta">October 26, 2016</span></div>
            </div></a><a href="#">
            <div class="post d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Great street atrs in London</strong><span class="date last-meta">October 26, 2016</span></div>
            </div></a><a href="#">
            <div class="post d-flex align-items-center">
                <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                <div class="title"><strong>Best coffee shops in Sydney</strong><span class="date last-meta">October 26, 2016</span></div>
            </div></a></div>
        </div>
    </div>
    </div> -->
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2017. All rights reserved. Poing.</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>Template By
                        <a href="https://bootstraptemple.com" class="text-white">Bootstrap Temple</a>
                        <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection
