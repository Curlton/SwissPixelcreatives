<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Professional Security: CSRF Token -->
    <!-- Essential for Livewire forms and AJAX requests in 2026 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Dynamic SEO: Managed per page via Livewire -->
    <title>{{ $title ?? 'SwissPixel | Professional Agency' }}</title>
    <meta name="description" content="{{ $description ?? 'SwissPixel provides high-end digital solutions.' }}">

    <!-- Stylesheets (Asset versioning is recommended for 2026) -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com" rel="stylesheet">
	
    @livewireStyles
</head>
<body>
	<div class="page-wrapper">

    <div class="preloader"></div>

    <!-- Back-to-top start -->
    <div class="back-to-top-wrapper">
      <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
    <!-- Back-to-top start -->

    <!-- Main Header-->
    <header class="main-header header-style-one">
      <div class="outer-container">
        <div class="header-lower anim-fade-move" data-delay="0.25">
          <div class="inner-container">
            <!-- Main box -->
            <div class="main-box">
              <div class="logo-box">
                <div class="logo">
                  <a href="{{ route('home') }}"><img src="{{ asset('home/images/Click_vision.png') }}" alt="Logo" style="max-height: 110px; width: auto; object-fit: contain;"/></a>
                </div>
              </div>

              <!--Nav Box-->
              <div class="nav-outer">
                <nav class="nav main-menu">
                  <ul class="navigation">
                    <li class="current dropdown">
                      <a href="{{ route('home') }}">Home</a>
                      
                    </li>
                    <li class="currentdropdown">
                      <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="current dropdown">
                      <a href="{{ route('services-grid') }}">Services</a>
                    </li>
					          <li class="{{ Request::is('login') ? 'current' : '' }}">
    <!-- 1. Use the Laravel route helper to point to your new login sub-page -->
                          <a href="{{ route('login') }}">
                             <i class="fal fa-user-circle" style="margin-right: 8px;"></i> Login
                          </a>
                    </li>

                    <li class="dropdown">
                      <a href="{{ route('projects') }}">Projects</a>
                      
                    </li>
                    <li class="dropdown">
                      <a href="{{ route('contact') }}">Contact-Us</a>
                      
                    </li>
                    
                  </ul>
                </nav>
              </div>
              <div class="action-box">
                <button class="ui-btn search-btn">
                  <i class="icon fal fa-search"></i>
                </button>
                <a href="{{ route('contact') }}" class="theme-btn btn-style-one">
                  <span class="btn-arrow-left">
                    <i class="far fa-chevron-right"></i>
                  </span>
                  <span class="btn-title"> Get In Touch</span>
                </a>
              </div>
			  


              <!--Mobile Navigation Toggler-->
              <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Menu  -->
      <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
          <div class="upper-box">
            <div class="nav-logo">
              <a href="/home"><img src="{{ asset('home/images/Click_vision.png') }}" alt="" /></a>
            </div>
            <div class="close-btn"><i class="icon fa fa-times"></i></div>
          </div>
          <ul class="navigation clearfix">
            <!--Keep This Empty / Menu will come through Javascript-->
          </ul>
          <ul class="contact-list-one">
            <li>
              <i class="icon lnr-icon-envelope1"></i>
              <span class="title">Send Email</span>
              <div class="text">
    <a href="mailto:support@swisspixel.com">support@swisspixel.com</a>
</div>

            </li>
          </ul>
          <ul class="social-links">
            <li>
              <a href="#"><i class="icon fab fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="icon fab fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"><i class="icon fab fa-pinterest-p"></i></a>
            </li>
            <li>
              <a href="#"><i class="icon fab fa-vimeo-v"></i></a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- End Mobile Menu -->

      

      <!-- Sticky Header  -->
      <div class="sticky-header">
        <div class="auto-container">
          <div class="inner-container">
            <!--Logo-->
            <div class="logo">
              <a href="/home"><img src="{{ asset('home/images/log_2.png') }}" alt="" /></a>
            </div>

            <!--Right Col-->
            <div class="nav-outer">
              <!-- Main Menu -->
              <nav class="main-menu">
                <div class="navbar-collapse show collapse clearfix">
                  <ul class="navigation clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                  </ul>
                </div>
              </nav>
              <!-- Main Menu End-->

              <!--Mobile Navigation Toggler-->
              <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
            </div>
            
            <a href="tel:+8801750050088 " class="header-phone_box">
              <span class="icon"><i aria-hidden="true" class="fas fa-phone-alt"></i></span>
              <span class="info">
                Call Anytime
                <strong>+88 017 500 500 88 </strong>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- End Sticky Menu -->
    </header>
	
	 <!--End Main Header -->

    <!-- Start banner-section-h1 -->
    <section class="{{ Request::is('/') || Request::is('home') ? 'banner-section-h1' : 'inner-page-wrapper' }}">
	    {{ $slot }}
	</section>

	<!-- Main Footer -->
    <footer class="main-footer footer-style-one">
      <!-- Widgets Section -->
      <div class="widgets-section">
        <div class="anim-icon"><img src="{{ asset('home/images/icons/footer-h1-2.png') }}" alt=""></div>
        <div class="container">
          <div class="row align-items-center">
            <!-- Footer Column -->
            <div class="footer-column col-lg-5">
              <div class="footer-widget about-widget wow fadeInLeft">
                <div class="footer-logo"><img src="{{ asset('home/images/Click_vision.png') }}" alt=""></div>
              </div>
            </div>
            <!-- footer column -->
            <div class="footer-column col-lg-2">
            </div>
            <div class="footer-column style-two col-lg-5">
              <div class="footer-widget subscribe-widget wow fadeInLeft" data-wow-delay="200ms">
                <h5 class="text">Get the latest inspiration & insights</h5>
                <div class="subscribe-form-one">
                  <form method="post" action="#">
                    <div class="form-group">
                      <input type="email" name="email" class="email" value="" placeholder="Email Address" required="">
                      <button type="button" class="theme-btn d-flex align-items-center">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M26 4.81c0-.15-.06-.3-.14-.43-.03-.06-.07-.12-.12-.17a.86.86 0 0 0-.49-.28L.34 9.54a.55.55 0 0 0-.1 1.03l7.2 3.8 1.24 7.01c.04.25.17.48.36.65.2.17.44.26.7.26h.15c.24 0 .47-.08.66-.22l4.8-3.2 5.02 3.26c.14.09.3.14.47.14.4 0 .75-.25.88-.63L25.97 4.93c.02-.07.03-.14.03-.22v-.1ZM20.98 7.61l-10.4 7.63-.14.16-.1.18-.01.02-1.19 3.86-.94-5.23 12.78-6.62Zm-11.06 12.56 1.18-3.9 1.84 1.19.53.35-1.78 1.19-1.77 1.17Zm12.64-14.33L7.82 13.38 1.7 10.15l20.86-3.31Zm-3.24 14.76-6.67-4.33-1.01-.66L24.66 5.97l-5.34 14.63Z" fill="white"/>
                        </svg>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <hr class="mb-40">
          <div class="row">
            <!-- Footer Column -->
            <div class="footer-column border-0 col-lg-5 col-sm-4">
              <div class="footer-widget about-widget wow fadeInLeft">
                <div class="widget-content">
                  <div class="contact-area">
                    <div class="mb-3"><a class="phone" href="tel:01750050088">+ (123) 456-7890</a></div>
                    <div><a class="mail" href="mailto:support@swisspixel.com">support@swisspixel.com</a></div>
                  </div>
                  <div class="social-widget mt-30">
                    <ul class="social-icon-list1 mb-5 mb-lg-0">
                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- footer column -->
            <div class="footer-column border-0 col-lg-2 col-sm-1">
            </div>
            <div class="footer-column style-two border-0 col-lg-5 col-sm-7">
              <div class="row d-block d-sm-flex">
                <div class="footer-widget links-widget col wow fadeInLeft" data-wow-delay="400ms">
                  <h5 class="widget-title">Quick Link</h5>
                  <div class="widget-content mb-5 mb-sm-0">
                    <ul class="user-links">
                      <li><a href="#">About</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Team Member</a></li>
                      <li><a href="#">Reviews</a></li>
                      <li><a href="#">Latest News</a></li>
                    </ul>
                  </div>
                </div>
                <div class="footer-widget style-two links-widget col wow fadeInLeft" data-wow-delay="400ms">
                  <h5 class="widget-title">Our Services</h5>
                  <div class="widget-content">
                    <ul class="user-links">
                      <li><a href="#">Meet Our Team</a></li>
                      <li><a href="#">What We Do</a></li>
                      <li><a href="#">Latest News</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">Faqs</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--  Footer Bottom -->
          <div class="footer-bottom">
            <div class="container">
              <div class="inner-container">
                <div class="copyright-text">© Copyright Reserved by SwissPixel</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--End Main Footer -->


  </div>
<!-- End Page Wrapper -->

<script src="{{ asset('home/js/jquery.js') }}"></script>
<script src="{{ asset('home/js/popper.min.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('home/js/jquery-ui.js') }}"></script>
<script src="{{ asset('home/js/wow.js') }}"></script>
<script src="{{ asset('home/js/select2.min.js') }}"></script>
<script src="{{ asset('home/js/appear.js') }}"></script>
<script src="{{ asset('home/js/bxslider.js') }}"></script>
<script src="{{ asset('home/js/knob.js') }}"></script>
<script src="{{ asset('home/js/swiper.min.js') }}"></script>
<script src="{{ asset('home/js/aos.js') }}"></script>
<script src="{{ asset('home/js/gsap.min.js') }}"></script>
<script src="{{ asset('home/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('home/js/splitType.js') }}"></script>
<script src="{{ asset('home/js/gsap-scroll-smoother.js') }}"></script>
<script src="{{ asset('home/js/gsap-scroll-to-plugin.js') }}"></script>
<script src="{{ asset('home/js/SplitText.min.js') }}"></script>
<script src="{{ asset('home/js/custom-gsap.js') }}"></script>
<script src="{{ asset('home/js/script.js') }}"></script>


<script>
        document.addEventListener('DOMContentLoaded', () => {
            window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        });
    </script>
@livewireScripts
</body>


</html>
