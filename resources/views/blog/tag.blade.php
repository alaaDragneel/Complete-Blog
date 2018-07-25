@extends('layouts.blog')

@section('title', "Tag {$tag->name} Details")

@section('content')
    <!-- Stunning Header -->
    
    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: {{ $tag->name }} </h1>
        </div>
    </div>
    
    <!-- End Stunning Header -->
    
    <!-- Post Details -->
    
    
    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
    
                <div class="row">
                    <div class="case-item-wrap">
                        @forelse ($tag->posts as $post)
                            @include('blog._postList', ['post' => $post])
                        @empty
                            <h1 class="text-center">No Posts Right No Here!</h1>
                        @endforelse
                    </div>
                </div>
    
                <!-- End Post Details -->
                <br>
                <br>
                <br>
                <!-- Sidebar-->
    
                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
    
                            <div class="tags-wrap">
                                @forelse ($tags as $t)
                                    <a href="{{ route('tag.posts', $t) }}" class="w-tags-item">{{ $t->name }}</a>
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
