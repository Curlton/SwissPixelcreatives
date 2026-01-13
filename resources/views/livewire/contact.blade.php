<x-layouts.home>
   <section class="page-title pt-5" 
    style="background-image: url({{ asset('home/images/background/page-title.jpg') }}); 
           padding: 220px 0 150px 0; 
           background-size: cover; 
           background-position: center;">
        <div class="auto-container">
            <div class="title-outer text-center" style="margin-top: 130px">
                <h1 class="title" style="color: white; font-weight: 800;">Contact Us</h1>
                <ul class="page-breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li style="color: rgba(255,255,255,0.7);">contact-us</li>
                </ul>
            </div>
        </div>
    </section>
      <!-- Contact Section -->
    <section class="contact-section-h2 pt-100 pb-100">
      <div class="outer-box">
        <div class="bg bg-pattern-13"></div>
        <div class="shape-11"></div>
        <div class="auto-container">
          <div class="row">

            <!-- Content Column -->
            <div class="content-column col-xl-6 col-lg-12 col-md-12 col-sm-12 wow fadeInLeft">
              <div class="inner-column">
                <div class="sec-title-h1 white wow fadeInUp">
                  <h6 class="sub-title mb-10 wow fadeInUp">Contact us</h6>
                  <h2 class="title">Get in Touch</h2>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                  <form method="post" action="https://html.kodesolution.com/2025/webtec-html/get" id="contact-form">
                    <div class="row">
                      <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <input type="text" name="name" placeholder="Your Name" required>
                      </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <input type="email" name="email" placeholder="Email Address" required>
                      </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <input type="text" name="subject" placeholder="Subject" required>
                      </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <input type="tel" name="tel" placeholder="Phone" required>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <textarea name="message" placeholder="Write a Message" required></textarea>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <div class="btn-box">
                          <button class="theme-btn btn-style-one" type="submit">
                            <span class="btn-title"> Send a Message</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!--End Contact Form -->
              </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
              <div class="inner-column">
                <figure class="image reveal"><img src="{{ asset('home/images/resource/contact1-1.jpg') }}" alt="Image">
                </figure>
                <div class="info-box wow fadeInUp" data-wow-delay="300ms">
                  <i class="icon fa fa-phone"></i>
                  <div class="content">
                    <div class="title">Call us anytime</div>
                    <h4 class="phone"><a href="tel:+00000222000">+1 (414) 204-9767</a></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="map-section">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3099.1861711686674!2d-77.40765712568873!3d39.03387447169518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b639947025a997%3A0x93c77c57dc8383a3!2s46090%20Lake%20Center%20Plaza%20305%20a%2C%20Sterling%2C%20VA%2020165%2C%20USA!5e0!3m2!1sen!2sug!4v1768233993302!5m2!1sen!2sug" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

</x-layouts.home>