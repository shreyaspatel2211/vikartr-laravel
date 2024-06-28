@include('common.header')
<div class="page-title-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Our Blogs</li>
                    </ul>
                    <h2 class="Inter">Our Blogs</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing industry.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section blog-listing">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-4">
                <article>
                    <div class="post-img">
                        <img class="img-fluid" src="{{ Storage::url($blog->icon_image) }}" alt="">
                    </div>
                    <p class="post-category caption accent-color">{{ $blog->name }}</p>
                    <h6 class="Inter-Medium secondary-white">
                        {{ $blog->question }}
                    </h6>
                    <p class="blog-description">{{ $blog->short_description }}</p>
                    <ul class="blog-author-info">
                        <li>
                            <a href="#" class="caption secondary-white"><i class="fa fa-user"></i> {{ $blog->author }}</a>
                        </li>
                        <li>
                            <a href="#" class="caption secondary-white"><i class="fa fa-calendar-check"></i> {{ $blog->created_at->format('d F Y') }}</a>
                        </li>
                    </ul>
                    <a href="{{ route('blog_details', $blog->id) }}" class="accent-color caption"><i class="fa fa-arrow-right"></i> Continue Reading...</a>
                </article>
            </div>
            @endforeach

        </div>
    </div>
</section>
@include('common.footer')