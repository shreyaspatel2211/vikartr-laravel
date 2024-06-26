@include('common.header')
<div class="page-title-area" style="background-image: url(/assets/images/about-us.jpg);">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
							<li>About Us</li>
						</ul>
                        <h2 class="Inter">About Us</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
<section class="section_all" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_all text-center">
                    <h3 class="Inter-SemiBold mb-3">Welcome To <span class="text-custom">Vikartr Technology</span></h3>
                    <p class="secondary-white">Vikartr Technologies is leading the way in the creation of innovative web, mobile, and cloud services, Vikartr Technologies is a leader in the field of digital solutions. Our enthusiasm for technology combined with our unwavering dedication to perfection motivates us to provide outstanding solutions that are customised to fit the various needs of our clients.</p>
                    <div class="">
                        <i class=""></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row vertical_content_manage mt-5 mb-5">
        <div class="col-lg-6 d-flex align-items-center bg-gray1 px-5 py-5">
            <div class="about_header_main">
                <div class="about_icon_box">
                    <p class="caption accent-color font-weight-bold uppercase">About Vikartr Technology</p>
                </div>
                <p class="mt-3 secondary-white">Vikartr Technologies is leading the way in the creation of innovative web, mobile, and cloud services, Vikartr Technologies is a leader in the field of digital solutions. Our enthusiasm for technology combined with our unwavering dedication to perfection motivates us to provide outstanding solutions that are customised to fit the various needs of our clients.</p>
                
                <p class="mt-3 secondary-white">At Vikartr Technologies, we strive to satisfy our customers above anything else. We take great satisfaction in providing solutions that not only match but also surpass our clients' expectations. We work closely with every client, from startups to large corporations, to comprehend their specific needs and customise our services in response. Our commitment to excellence, dependability, and novelty distinguishes us as a reliable collaborator on the path towards digital transformation.</p>
                <h4 class="about_heading text-capitalize font-weight-bold mt-4 gray3 Inter-SemiBold">Reach Out</h4>
                
                <p class="mt-3 secondary-white">Are you prepared to take on your next digital endeavour? Reach out to Vikartr Technologies right now, and allow us to bring your concepts to life. Our staff can assist you in succeeding whether your goal is to create a web application, a mobile application, or to take advantage of cloud computing capability. Together, let's create the future.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="img_about">
                <img src="https://i.ibb.co/qpz1hvM/About-us.jpg" alt="" class="img-fluid mx-auto d-block">
            </div>
        </div>
    </div>

    <!-- <div class="row mt-3">
        <div class="col-lg-4">
            <div class="about_content_box_all mt-3">
                <div class="about_detail text-center">
                    <div class="about_icon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <h5 class="text-capitalize mt-3 Inter-SemiBold secondary-white">Creative Design</h5>
                    <p class="edu_desc mt-3 mb-0 secondary-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="about_content_box_all mt-3">
                <div class="about_detail text-center">
                    <div class="about_icon">
                        <i class="fab fa-angellist"></i>
                    </div>
                    <h5 class="text-capitalize mt-3 Inter-SemiBold secondary-white">We make Best Result</h5>
                    <p class="edu_desc mb-0 mt-3 secondary-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="about_content_box_all mt-3">
                <div class="about_detail text-center">
                    <div class="about_icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h5 class="text-capitalize mt-3 Inter-SemiBold secondary-white">best platform </h5>
                    <p class="edu_desc mb-0 mt-3 secondary-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
        </div>
    </div> -->
</section>

<!-- our team section -->
<section class="our-team-section bg-gray2 mb-5 py-5">
    <div class="container text-center px-3 py-16 mx-auto">
        <h1 class="">We work as a Team!</h1>
        <p class="mt-3 text-lg max-w-lg mx-auto">Start growing in half the time with an&nbsp;all-in-one&nbsp;website builder - no more long hours spent on the boring stuff!</p>
        <div class="row mt-5">
            @foreach($teams as $team)
            <div class="col-lg-3 text-center">
            <img class="our-team-img mb-3" alt="{{ $team->name }}" src="{{ Storage::url($team->image) }}">
                <h4 class="">{{ $team->name }}</h4>
                <p class="">{{ $team->designation }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- our team section -->

<!-- faq section -->
<!-- <section class="faq-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="title-intro-section">
                    <h2 class="uppercase">FAQS</h2>
                    <p>Here are some frequently asked questions we get from our prospects on MVP Development</p>
                </div>
                <div id="accordionExample" class="accordion shadow">
                    <div class="card">
                        <div id="headingOne" class="card-header bg-gray1 shadow-sm border-0">
                        <h4 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne"
                            class="btn-link font-weight-bold text-uppercase collapsible-link secondary-white bg-gray1">Collapsible Group Item
                            #1</button>
                        </h4>
                        </div>
                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                            terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et.</p>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="headingTwo" class="card-header bg-gray1 shadow-sm border-0">
                        <h4 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo"
                            class="btn-link collapsed font-weight-bold text-uppercase collapsible-link secondary-white bg-gray1">Collapsible
                            Group Item #2</button>
                        </h4>
                        </div>
                        <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                            terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et.</p>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div id="headingThree" class="card-header bg-gray1 shadow-sm border-0">
                        <h4 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree"
                            class="btn-link collapsed font-weight-bold text-uppercase collapsible-link secondary-white bg-gray1">Collapsible
                            Group Item #3</button>
                        </h4>
                        </div>
                        <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                            terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et.</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  -->
<!-- faq section -->
@include('common.footer')