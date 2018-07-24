@extends('layouts.blog')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @include('blog._latestHotPost', ['post' => $latestHotPost, 'width' => '690px', 'height' => '390px'])
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            @forelse ($latestPosts as $latestPost)
                <div class="col-lg-6">
                    @include('blog._latestHotPost', ['post' => $latestPost, 'width' => '495px', 'height' => '280px'])
                </div>
            @endforeach
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    @foreach ($categories as $category)
                        @include('blog._categoriesList', ['category' => $category])
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
{{-- 
    
    
    
<div class="offers">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="heading">
                <h4 class="h1 heading-title">Laravel 5.3</h4>
                <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="case-item-wrap">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb">
                        <img src="{{ asset('/img/2.png') }}" alt="our case">
                    </div>
                    <h6 class="case-item__title"><a href="#">Investigationes demonstraverunt legere</a></h6>
                </div>
            </div>

            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb">
                        <img src="{{ asset('/img/3.jpg') }}" alt="our case">
                    </div>
                    <h6 class="text-center case-item__title">Claritas est etiam processus dynamicus</h6>
                </div>
            </div>

            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                        <img src="{{ asset('/img/4.jpg') }}" alt="our case">
                    </div>
                    <h6 class="case-item__title">quod mazim placerat facer possim assum</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="padded-50"></div>
<div class="offers">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="heading">
                <h4 class="h1 heading-title">Laravel 5.3</h4>
                <div class="heading-line">
                    <span class="short-line"></span>
                    <span class="long-line"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="case-item-wrap">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb">
                        <img src="{{ asset('/img/5.jpg') }}" alt="our case">
                    </div>
                    <h6 class="case-item__title"><a href="#">Investigationes demonstraverunt legere</a></h6>
                </div>
            </div>

            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb">
                        <img src="{{ asset('/img/2.png') }}" alt="our case">
                    </div>
                    <h6 class="case-item__title">Claritas est etiam processus dynamicus</h6>
                </div>
            </div>

            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                <div class="case-item">
                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                        <img src="{{ asset('/img/6.jpg') }}" alt="our case">
                    </div>
                    <h6 class="case-item__title">quod mazim placerat facer possim assum</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="padded-50"></div>    
    
    
    
--}}
    <!-- Subscribe Form -->

    <div class="container-fluid bg-green-color">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="subscribe scrollme">
                        <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                            <h4 class="subscribe-title">Email Newsletters!</h4>
                            <form class="subscribe-form" method="post" action="">
                                <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                                <button class="subscr-btn">subscribe
                                    <span class="semicircle--right"></span>
                                </button>
                            </form>
                            <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                        </div>

                        <div class="images-block">
                            <img src="{{ asset('/img/subscr-gear.png') }}" alt="gear" class="gear">
                            <img src="{{ asset('/img/subscr1.png') }}" alt="mail" class="mail">
                            <img src="{{ asset('/img/subscr-mailopen.png') }}" alt="mail" class="mail-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Subscribe Form -->
@endsection


