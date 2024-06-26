@include('common.header')
<!-- Banner Section Start -->
<div class="page-title-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li>Services</li>
                    </ul>
                    <h2 class="Inter">Services</h2>
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
            <h2 class="uppercase">Our Services</h2>
            <!-- <p>Collective success stories, we've crafted</p> -->
        </div>
        <div class="tabs-slider-wrapper">
            <div class="item-slider">
                <div class="slider-item-wrapper">
                    @foreach($services as $service)
                    <a href="{{ route('service', ['slug' => $service->slug]) }}" class="slider-item">
                        <div class="slider-item-inner">
                            <img class="img-cover" src="{{ Storage::url($service->image) }}" alt="Query Mate">
                            <div class="slider-title-wrapper">
                                <div class="slider-title h4 IBMPlexMono-Medium primary-color">
                                    <span class="primary-color">{{ $service->name }}</span>
                                    <!-- <div class="slider-title-tech h6 Inter-Medium gray1">
                                        <img src="./dist/assets/images/old/web.svg" alt="web" />
                                        Web
                                    </div> -->
                                </div>
                                <p class="primary-color">{{$service->description}}</p>
                            </div>
                            <div class="tab-slider-item-hover">
                                <div class="slider-title h4 IBMPlexMono-Medium primary-color">
                                    <span class="primary-color">{{ $service->name }}</span>
                                    <!-- <div class="slider-title-tech h6 Inter-Medium gray1">
                                        <img src="./dist/assets/images/old/web.svg" alt="web" />
                                        Web
                                    </div> -->
                                </div>
                                <p class="primary-color">{{$service->descrption}}</p>
                                <div class="tab-slider-item-hover-bootom">
                                    <div class="tab-slider-item-hover-left tab-slider-item-hover-tags-wrapper">
                                        @foreach(explode(',', $service->streams) as $stream)
                                        <div class="tab-slider-item-hover-tag caption uppercase secondary-white">{{ $stream}}</div>
                                        @endforeach
                                    </div>
                                    <!-- <div class="tab-slider-item-hover-right tab-slider-item-hover-contry h6 Inter-Medium primary-color">
                                        <img src="" alt="hongkong-flag" />
                                        Hongkong
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@include('common.footer')