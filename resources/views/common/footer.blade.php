<footer class="footer-section">
		<div class="container">
			<div class="footer-cta pt-5 pb-5">
				<div class="row">
					<div class="col-xl-4 col-md-4 mb-30">
						<div class="single-cta d-flex">
							<i class="fas fa-map-marker-alt"></i>
							<div class="cta-text">
								<h4>Find us</h4>
								<span>E-823, Radhe Infinity, Raksha Shakti Cir, Urjanagar 1, Randesan, Gandhinagar, Gujarat 382421</span>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-4 mb-30">
						<div class="single-cta">
							<i class="fas fa-phone"></i>
							<div class="cta-text">
								<h4>Call us</h4>
								<a href="tel:+9227000753">
									<span>9227000753</span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-md-4 mb-30">
						<div class="single-cta">
							<i class="far fa-envelope-open"></i>
							<div class="cta-text">
								<h4>Mail us</h4>
								<a href="mailto:info@vikartrtechnologies.com">
									<span>info@vikartrtechnologies.com</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-content pt-5 pb-5">
				<div class="row">
					<div class="col-xl-4 col-lg-4 mb-50">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="{{ route('index') }}"><img src="/assets/images/logo-new.svg" class="img-cover" alt="logo"></a>
							</div>
							<div class="footer-text">
								<p> Web. Mobile. Cloud. We do it all! "</p>
							</div>
							<!-- <div class="footer-social-icon">
								<span>Follow us</span>
								<a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
								<a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
								<a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
							</div> -->
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 mb-30">
						<div class="footer-widget">
							<div class="footer-widget-heading">
								<h3>Useful Links</h3>
							</div>
							<ul>
								<li><a href="{{ route('index') }}">Home</a></li>
								<li><a href="{{ route('about') }}">About Us</a></li>
								<li><a href="{{ route('services') }}">Our Services</a></li>
								{{-- <li><a href="{{ route('portfolio') }}">Portfolio</a></li> --}}
								{{-- <li><a href="{{ route('blog') }}">Blogs</a></li> --}}
								<li><a href="{{ route('contactus') }}">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 mb-50">
						<div class="footer-widget">
							<div class="footer-widget-heading">
								<h3>Location</h3>
							</div>
							<div class="footer-text mb-25">
								<p>E-823, Radhe Infinity, Raksha Shakti Cir, Urjanagar 1, Randesan, Gandhinagar, Gujarat 382421</p>
							</div>
							<div>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3667.593336209615!2d72.63721567531873!3d23.185037879060307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d247ac15088e183%3A0x34e5284bc9dbc494!2sVikartr%20Technologies!5e0!3m2!1sen!2sin!4v1711274914378!5m2!1sen!2sin" width="100%" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 text-center text-lg-left">
						<div class="copyright-text">
							<p>Copyright &copy; 2024, All Right Reserved <a href="{{ route('index') }}">Vikartr Technology</a></p>
						</div>
					</div>
					<!-- <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
						<div class="footer-menu">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#">Policy</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</footer>
	
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/slick.min.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>