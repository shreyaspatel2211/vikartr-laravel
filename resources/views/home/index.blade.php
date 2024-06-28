@include('common.header')
<!-- Banner Section Start -->
<div class="main-banner">
    <div class="container">
        <div class="row">
            <div class="line-inner style2">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <div class="col-lg-6 banner-left">
                <div class="banner-content"> 
                    <h1 class="title uppercase IBMPlexMono-Medium">Web,Mobile and Cloud solutions</h1>
                    <p class="desc">
                        We are frontrunner in digital transformation, specializing in the development of Web applications, Mobile applications, and Cloud services. We empower businesses to thrive in today's dynamic landscape by crafting cutting-edge solutions that cater to your specific needs.
                    </p>
                    <!-- <div class="btn-wrapper btn-fit view-our-service">
                        <a href="https://csdev.site/creole_new/cost-calculator/" class="btn" target="">Pricing Models</a>
                        <div class="btn__shadow white"></div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-6 banner-right">
                <div class="banner-img">
                    <img class="img-cover" src="/assets/images/banner.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>  
<!-- Banner Section End -->

<!-- Abous us section -->
<section class="section home-about position-relative" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="block-decorate-img wow fadeInLeft d-flex justify-content-end">
                    <img src="/assets/images/home-1-570x703.jpg" alt="" width="570" height="150">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-content-wrapper">
                    <!-- <div class="section-name wow fadeInRight caption accent-color uppercase">About us</div> -->

                    <h3 class="wow fadeInLeft uppercase devider-bottom">What We
                        <span class="text-primary">Do</span>
                    </h3>

                    <p class="offset-xl-40 wow fadeInUp">At Vikartr Technologies, we are experts at developing cutting-edge solutions that enable companies to prosper in the digital economy. With experience in cloud services, mobile application development, and web development, we provide a full range of services that are specifically designed to satisfy the demands of our customers.</p>

                    <p class="default-letter-spacing font-weight-bold text-gray-dark wow fadeInUp">
                        Our skilled developers specialise in creating dynamic, flexible websites. Technologies like Laravel, React, PHP, Bootstrap, HTML, and JavaScript enable us to build dependable web apps and attractive websites that draw visitors in and encourage business growth.Our skilled development team excels in creating dynamic, flexible websites. We are a reliable partner for developing engaging and easy-to-use mobile applications in the quickly changing field of mobile technology. Our team possesses the necessary skills to develop apps for iOS, Android, Flutter, and React Native, guaranteeing a flawless user experience and flawless performance.Making use of cloud computing's potential, we provide comprehensive solutions that enhance scalability and streamline business processes. Our expert guidance and support in leveraging cloud infrastructure, from AWS and Azure to Google Cloud, enables businesses to innovate and thrive in the contemporary digital environment.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="decor-text decor-text-1">ABOUT</div> -->
    </section>
<!-- Abous us section -->

<!-- service section -->
{{-- <section class="section our-services- our-services">
    <div class="container">
        <div class="title-intro-section">
            <h2 class="uppercase">Our Services</h2>
            <p class="">Benefit from our cohesive team of professionals who have collaborated seamlessly for years. Experience immediate synergy from the start of your project.</p>
        </div>

        <div class="tabs-slider-wrapper">
            <div class="item-slider">
            @foreach($services->take(3) as $service)
                <a href="{{ route('service', ['slug' => $service->slug]) }}" class="slider-item active">
                    <div class="slider-item-inner">
                        <div class="slider-img-wrapper">
                            <img class="img-cover" src="{{ Storage::url($service->image) }}" alt="Query Mate">
                        </div>
                        <div class="slider-title  h4 IBMPlexMono-Medium secondary-white">{{ $service->name }}</div>
                        <div class="tab-slider-item-hover">
                            <div href="{{ route('service', ['slug' => $service->slug]) }}" class=" h4 IBMPlexMono-Medium secondary-white">{{ $service->name }}</div>
                            <p class="secondary-white">{{$service->description}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="btn-wrapper btn-fit align-right">
            <a href="{{ route('services') }}" class="btn">View All Services</a>
            <div class="btn__shadow white"></div>
        </div>
    </div>
</section> --}}
<!-- service section -->





<!-- service section -->
<section class="section our-services-home our-services">
    <div class="container">
        <div class="title-intro-section">
            <h2 class="uppercase">Our Services</h2>
            <p class="">Benefit from our cohesive team of professionals who have collaborated seamlessly for years. Experience immediate synergy from the start of your project.</p>
        </div>

        <div class="tabs-slider-wrapper">
            <div class="item-slider">
                @foreach($services->take(3) as $service)
                <a href="{{ route('service', ['slug' => $service->slug]) }}" class="slider-item {{ $loop->first ? 'active' : '' }}">
                    <div class="slider-item-inner">
                        <div class="slider-img-wrapper">
                            <img class="img-cover" src="{{ Storage::url($service->image) }}" alt="Query Mate">
                        </div>
                        <div class="slider-title  h4 IBMPlexMono-Medium secondary-white">{{ $service->name }}</div>
                        <div class="tab-slider-item-hover">
                            <div href="{{ route('service', ['slug' => $service->slug]) }}" class=" h4 IBMPlexMono-Medium secondary-white">{{ $service->name }}</div>
                            <p class="secondary-white">{{$service->description}}</p>
                        </div>
                    </div>
                </a>
                @endforeach
                {{-- <a href="mobile-app-development.php" class="slider-item">
                    <div class="slider-item-inner">
                        <div class="slider-img-wrapper">
                            <img class="img-cover" src="dist/assets/images/mobile-app.jpg" alt="Query Mate">
                        </div>
                        <div href="mobile-app-development.php" class="slider-title h4 IBMPlexMono-Medium secondary-white">Mobile App Development</div>
                        <div class="tab-slider-item-hover">
                            <div href="mobile-app-development.php" class=" h4 IBMPlexMono-Medium secondary-white">Mobile App Development</div>
                            <p class="secondary-white">Paving the way in mobile app development, Vikartr Technologies provides customized solutions to companies looking to succeed in the</p>
                        </div>
                    </div>
                </a>
                <a href="cloud-consulting.php" class="slider-item">
                    <div class="slider-item-inner">
                        <div class="slider-img-wrapper">
                            <img class="img-cover" src="dist/assets/images/Cloud-Consulting.jpg" alt="Query Mate">
                        </div>
                        <div class="slider-title  h4 IBMPlexMono-Medium secondary-white">Cloud Consulting</div>
                        <div class="tab-slider-item-hover">
                            <div class=" h4 IBMPlexMono-Medium secondary-white">Cloud Consulting</div>
                            <p class="secondary-white">Vikartr Technologies is committed to assisting companies in realizing the full potential of cloud computing as a means of fostering creativity,</p>
                        </div>
                    </div>
                </a> --}}
            </div>
        </div>
        <div class="btn-wrapper btn-fit align-right">
            <a href="{{ route('services') }}" class="btn">View All Services</a>
            <div class="btn__shadow white"></div>
        </div>
    </div>
</section>
<!-- service section -->






<!-- service section -->
<section class="section project-numbers ">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="counter-classic">
                    <div class="counter-classic-number">
                        <h2 class="counter text-white animated-first IBMPlexMono-Bold" data-speed="2000">2022</h2>
                </div>
                <h6 class="counter-classic-title Inter-SemiBold">Year of Establishment</h6>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="counter-classic">
                <div class="counter-classic-number">
                    <h2 class="counter text-white animated-first IBMPlexMono-Bold" data-speed="2000">40+</h2>
                </div>
                <h6 class="counter-classic-title Inter-SemiBold">Successful Projects</h6>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="counter-classic">
                <div class="counter-classic-number">
                    <h2 class="counter text-white animated-first IBMPlexMono-Bold" data-speed="2000">3</h2>
                </div>
                <h6 class="counter-classic-title Inter-SemiBold">Global Partners</h6>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="counter-classic">
                <div class="counter-classic-number">
                    <h2 class="counter text-white animated-first IBMPlexMono-Bold" data-speed="2000">23</h2>
                </div>
                <h6 class="counter-classic-title Inter-SemiBold">Team Members</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section -->

<!-- testimonials section -->
<!-- <div class="testimonial">
    <div class="container">
        <div class="title-intro-section">
            <h2 class="uppercase">Clientele & Testimonials</h2>
        </div>
    </div>
    <div class="container">
        <div class="testimonial-slider-wrapper bg-primary-color">
            <div class="testimonial-slider">
                <div class="testimonial-slider-item">
                    <div class="testimonial-slider-item-left">
                        <img src="./dist/assets/images/old/indysingh.jpg" class="client-image" alt="client's profile picture">
                        <div class="client-details">
                            <h5 class="uppercase Inter-Medium">INDY SINGH</h5>
                            <h6 class="Inter-Medium">Director at Khalsa Aid International - UK</h6>
                        </div>
                        <img src="./dist/assets/images/logo-new.svg" class="client-company-logo" alt="">
                    </div>
                    <div class="testimonial-slider-item-right">
                        <img src="./dist/assets/images/old/quotes.svg" class="quote-img" alt="quote-img">
                        <h4 class="IBMPlexMono-Medium">They performed in all aspects excellently and showed genuine interest in the project.</h4>
                        <h6 class="Inter-Medium">“Creole Studios have been very professional, prompt and thorough whilst working on our website. We could not have asked for a better development partner. We have received 20% growth in page views, correlating with increased donation income. Working with a perfectionist is not easy, yet they have demonstrated patience and adapted to all changes made from our side. We look forward to starting further projects with Creole Studios.”</h6>
                    </div>
                </div>
                <div class="testimonial-slider-item">
                    <div class="testimonial-slider-item-left">
                        <img src="./dist/assets/images/old/indysingh.jpg" class="client-image" alt="client's profile picture">
                        <div class="client-details">
                            <h5 class="uppercase Inter-Medium">INDY SINGH</h5>
                            <h6 class="Inter-Medium">Director at Khalsa Aid International - UK</h6>
                        </div>
                        <img src="./dist/assets/images/logo-new.svg" class="client-company-logo" alt="">
                    </div>
                    <div class="testimonial-slider-item-right">
                        <img src="./dist/assets/images/old/quotes.svg" class="quote-img" alt="quote-img">
                        <h4 class="IBMPlexMono-Medium">They performed in all aspects excellently and showed genuine interest in the project.</h4>
                        <h6 class="Inter-Medium">“Creole Studios have been very professional, prompt and thorough whilst working on our website. We could not have asked for a better development partner. We have received 20% growth in page views, correlating with increased donation income. Working with a perfectionist is not easy, yet they have demonstrated patience and adapted to all changes made from our side. We look forward to starting further projects with Creole Studios.”</h6>
                    </div>
                </div>
                <div class="testimonial-slider-item">
                    <div class="testimonial-slider-item-left">
                        <img src="./dist/assets/images/old/indysingh.jpg" class="client-image" alt="client's profile picture">
                        <div class="client-details">
                            <h5 class="uppercase Inter-Medium">INDY SINGH</h5>
                            <h6 class="Inter-Medium">Director at Khalsa Aid International - UK</h6>
                        </div>
                        <img src="./dist/assets/images/logo-new.svg" class="client-company-logo" alt="">
                    </div>
                    <div class="testimonial-slider-item-right">
                        <img src="./dist/assets/images/old/quotes.svg" class="quote-img" alt="quote-img">
                        <h4 class="IBMPlexMono-Medium">They performed in all aspects excellently and showed genuine interest in the project.</h4>
                        <h6 class="Inter-Medium">“Creole Studios have been very professional, prompt and thorough whilst working on our website. We could not have asked for a better development partner. We have received 20% growth in page views, correlating with increased donation income. Working with a perfectionist is not easy, yet they have demonstrated patience and adapted to all changes made from our side. We look forward to starting further projects with Creole Studios.”</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- testimonials section -->

@include('common.footer')
 
