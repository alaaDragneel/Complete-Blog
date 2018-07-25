
<article class="hentry post post-standard has-post-thumbnail sticky">
        <div class="post-thumb">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" style="width: {{ $width }}; height: {{ $height }};">
            <div class="overlay"></div>
            <a href="{{ $post->image }}" class="link-image js-zoom-image">
                <i class="seoicon-zoom"></i>
            </a>
            <a href=" {{ route('posts.single', ['slug' => $post->slug]) }} " class="link-post">
                <i class="seoicon-link-bold"></i>
            </a>
        </div>

        <div class="post__content">

            <div class="post__content-info">

                    <h2 class="post__title entry-title ">
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}">{{ str_limit($post->title, 20) }}</a>
                    </h2>

                    <div class="post-additional-info">

                        <span class="post__date">

                            <i class="seoicon-clock"></i>

                            <time class="published" datetime="{{ $post->created_at }}">
                                {{ $post->created_at->diffForHumans() }}
                            </time>

                        </span>

                        <span class="category">
                            <i class="seoicon-tags"></i>
                            <a href="{{ route('category.posts', $post->category) }}">{{ optional($post->category)->name }}</a>
                        </span>
                    </div>
            </div>
        </div>

</article>
