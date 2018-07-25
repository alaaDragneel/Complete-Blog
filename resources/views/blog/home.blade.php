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

   
@endsection


