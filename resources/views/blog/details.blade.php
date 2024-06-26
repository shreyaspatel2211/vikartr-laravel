@include('common.header')
<section class="section blog-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-content">
                    <div class="bs-img mb-35">
                        <img src="{{ Storage::url($blog->banner_image) }}" alt="">
                    </div>
                    <div class="blog-full">
                        <ul class="single-post-meta">
                            <li>
                                <span class="p-date "><i class="fa fa-calendar-check logo-color-1"></i> {{ $blog->created_at->format('F d Y') }} </span>
                            </li>
                            <li>
                                <span class="p-date "> <i class="fa fa-user-circle logo-color-1"></i> {{ $blog->user->name}} </span>
                            </li>
                            <li class="Post-cate">
                                <div class="tag-line">
                                    <i class="fa fa-book logo-color-1"></i>
                                    <a href="#" class="secondary-white">Strategy</a>
                                </div>
                            </li>
                            <li class="post-comment "> <i class="fa fa-comments logo-color-1"></i> 1</li>
                        </ul>
                        <p>
                            {{ $blog->long_description }}
                        </p>
                        <blockquote>
                            <img src="/assets/images/old/quotes.svg" alt="">
                            <p>{{ $blog->quote}}<br>
                                <cite>Robert Calibo</cite>
                            </p>
                        </blockquote>
                        <h3>Digital technology on the cutting edge</h3>
                        <ul class="dots">
                            <li>How will digital activities impact traditional manufacturing.</li>
                            <li>All these digital elements and projects aim to enhance .</li>
                            <li>I monitor my staff with software that takes screenshots.</li>
                            <li>Laoreet dolore magna niacin sodium glutimate aliquam hendrerit.</li>
                            <li>Minim veniam quis niacin sodium glutimate nostrud exerci dolor.</li>
                        </ul>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                        <div class="bs-img mb-30">
                            <img src="/assets/images/blog/inner/6.jpg" alt="">
                        </div>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.</p>

                        <div class="comment-body">
                            <div class="rstheme-logo">
                                <img src="/assets/images/old/partner1.png" alt="">
                            </div>
                            <div class="comment-meta">
                                <span><a href="#" class="secondary-white">Admin</a></span>
                                <a href="#" class="gray3">December 3, 2020 at 8:30 am</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <!-- <div class="recent-posts mb-50">
                    <div class="widget-title">
                        <h3 class="title">Latest Posts</h3>
                    </div>
                    <div class="recent-post-widget">
                        <div class="post-img">
                            <a href="#"><img src="/assets/images/blog-1.jpg" alt=""></a>
                        </div>
                        <div class="post-desc">
                            <a href="#">pen Source Job Report Show More Openings Fewer </a>
                            <span class="date">
                            <i class="fa fa-calendar"></i>
                                January 21, 2020
                            </span>
                        </div>
                    </div>
                    <div class="recent-post-widget">
                        <div class="post-img">
                            <a href="#"><img src="/assets/images/blog-1.jpg" alt=""></a>
                        </div>
                        <div class="post-desc">
                            <a href="#">Tech Products That Makes Its Easier to Stay at Home</a>
                            <span class="date">
                            <i class="fa fa-calendar"></i>
                            January 21, 2020
                            </span>
                        </div>
                    </div>
                    <div class="recent-post-widget">
                        <div class="post-img">
                            <a href="#"><img src="/assets/images/blog-1.jpg" alt=""></a>
                        </div>
                        <div class="post-desc">
                            <a href="#">Necessity May Give Us Your Best Virtual Court System </a>
                            <span class="date">
                            <i class="fa fa-calendar"></i>
                            January 21, 2020
                            </span>
                        </div>
                    </div>
                    <div class="recent-post-widget">
                        <div class="post-img">
                            <a href="#"><img src="/assets/images/blog-1.jpg" alt=""></a>
                        </div>
                        <div class="post-desc">
                            <a href="#">Servo Project Joins The Linux Foundation Fold Desco </a>
                            <span class="date">
                            <i class="fa fa-calendar"></i>
                            January 21, 2020
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
@include('common.footer')
