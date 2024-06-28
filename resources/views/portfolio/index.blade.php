@include('common.header')
<!-- Banner Section Start -->
<div class="page-title-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('index')}}">Home</a></li>
                        <li>Our Works</li>
                    </ul>
                    <h2 class="Inter">Our Works</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing industry.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->
<section class="section tab-slider-main featured-works tab-slider-two-tile our-services">
    <div class="container">
        <div class="title-intro-section">
            <h2 class="uppercase">Our Works</h2>
            <!-- <p>Collective success stories, we've crafted</p> -->
        </div>
        <div class="tabs-slider-wrapper">
            <div class="item-slider">
                <div class="slider-item-wrapper">
                    @foreach($portfolios as $portfolio)
                    <a href="" class="slider-item">
                        <div class="slider-item-inner">
                            <img class="img-cover" src="{{ Storage::url($portfolio->image) }}" alt="Query Mate">
                            <div class="slider-title-wrapper">
                                <div class="slider-title h4 IBMPlexMono-Medium primary-color">
                                    <span class="primary-color">{{ $portfolio->name }}</span>
                                    <div class="slider-title-tech h6 Inter-Medium gray1">
                                        <img src="{{ Storage::url($portfolio->source_logo) }}" alt="web" />
                                        {{ $portfolio->sourceType }}
                                    </div>
                                </div>
                                <p class="primary-color">{{ $portfolio->description }}</p>
                            </div>
                            <div class="tab-slider-item-hover">
                                <div class="slider-title h4 IBMPlexMono-Medium primary-color">
                                    <span class="primary-color">Query Mate</span>
                                    <div class="slider-title-tech h6 Inter-Medium gray1">
                                        <img src="{{ Storage::url($portfolio->source_logo)  }}" alt="web" />
                                        {{ $portfolio->sourceType }}
                                    </div>
                                </div>
                                <p class="primary-color">{{ $portfolio->description }}</p>
                                <div class="tab-slider-item-hover-bootom">
                                    <div class="tab-slider-item-hover-left tab-slider-item-hover-tags-wrapper">
                                    @foreach(explode(',', $portfolio->streams) as $stream)
                                        <div class="tab-slider-item-hover-tag caption uppercase secondary-white">{{ $stream}}</div>
                                    @endforeach
                                    </div>
                                    <div class="tab-slider-item-hover-right tab-slider-item-hover-contry h6 Inter-Medium primary-color">
                                        <img src="{{ Storage::url($portfolio->country_logo) }}" alt="hongkong-flag" />
                                        {{ $portfolio->country->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('common.footer');