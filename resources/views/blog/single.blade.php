@extends('layouts.blog') 

@section('title', "{$post->title} Details")

@section('content')



    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{ $post->title }}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" style="width: 945px; height: 530px;">
                        </div>

                        <div class="post__content">

                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{ $post->owner->name }}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="{{ $post->created_at }}">
                                        {{ $post->created_at->diffForHumans() }}
                                    </time>

                                </span>

                                <span class="category">
                                    <i class="seoicon-tags"></i>
                                    <a href=" {{ route('category.posts', $post->category) }} ">
                                        {{ $post->category->name }}
                                    </a>
                                </span>

                            </div>

                            <div class="post__content-info">

                                <p>
                                    {!! $post->body !!}
                                </p>


                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @forelse ($post->tags as $tag)
                                            <a href="{{ route('tag.posts', $tag) }}" class="w-tags-item">{{ $tag->name }}</a>
                                        @empty
                                            <h1 class="text-center">No Tags Available!</h1>
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials">
                            Share:
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div> 
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{ $post->owner->profile->avatar }}" alt="{{ $post->owner->name }}" style="width: 110px; height: 110px; border-radius: 50%;">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{ $post->owner->name }}</h5>
                            </div>
                            <p class="text">
                                {{ $post->owner->profile->about }}
                            </p>
                            <div class="socials">

                                <a href="{{ $post->owner->profile->facebook }}" class="social__item">
                                    <img src="{{ asset('svg/circle-facebook.svg') }}" alt="facebook">
                                </a>

                                <a href="{{ $post->owner->profile->youtube }}" class="social__item">
                                    <img src="{{ asset('svg/youtube.svg') }}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">

                        @if ($next_post)
                            
                            <a href="{{ route('posts.single', ['slug' => $next_post->slug]) }}" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{ $next_post->title }}</p>
                                </div>
                            </a>
                            
                        @endif

                        @if ($prev_post)
                            
                            <a href="{{ route('posts.single', ['slug' => $prev_post->slug]) }}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Previous Post</div>
                                    <p class="btn-content-subtitle">{{ $prev_post->title }}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif

                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @include('blog._disqus', ['post' => $post])
                    </div>


                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                @forelse ($tags as $tag)
                                    <a href="{{ route('tag.posts', $tag) }}" class="w-tags-item">{{ $tag->name }}</a>
                                @empty
                                    <h1 class="text-center">No Tags Available!</h1>
                                @endforelse

                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>

@endsection