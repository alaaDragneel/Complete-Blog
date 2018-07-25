<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="case-item">
        <div class="case-item__thumb">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" style="width: 290px; height: 165px;">
        </div>
        <h6 class="case-item__title"><a href="{{ route('posts.single', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h6>
    </div>
</div>