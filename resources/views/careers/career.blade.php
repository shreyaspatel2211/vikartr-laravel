@include('common.header')
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <ul>
                            <li><a href="{{ route('index') }}"></a></li>
                            <li>Careers</li>
                        </ul>
                        <h2 class="Inter">Join Us</h2>
                        <p>Find the career of your dreams. In Last week, we helps 20 of job seekers and employers find the right fit. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section blog-listing career-list">
        <div class="container">
            <div class="row">
                @foreach($careers as $career)
                <div class="col-md-4">
                    <article>
                        <div class="career-list-wrapper">
                            <div class="post-img">
                                <img class="img-fluid" src="{{ Storage::url($career->image) }}" alt="">
                            </div>
                            <div class="career-details">
                                <h6 class="Inter-Medium secondary-white">
                                    {{ $career->designation }}
                                </h6>
                                <ul class="blog-author-info">
                                    <li>
                                        <a href="#" class="caption secondary-white"><i class="fa fa-user"></i> {{ $career->experience }} of experience</a>
                                    </li>
                                    <li>
                                        <a href="#" class="caption secondary-white"><i class="fa fa-marker"></i> {{$career->city->name}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn-wrapper btn-fit">
                            <a href="mailto:info@vikartrtechnologies.com" class="btn">Apply Now</a>
                            <div class="btn__shadow white"></div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@include('common.footer')