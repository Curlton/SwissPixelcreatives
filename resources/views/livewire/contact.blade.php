<x-layouts.home>
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
                    <h4 class="phone"><a href="tel:+00000222000">+00 000 222 000</a></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="map-section">
   <iframe 
   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2713.104201640341!2d8.516453575330607!3d47.155813571152024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479aaae6b4024c9d%3A0x7dc1f098ff2c02fb!2sGuggitalring%203%2C%206300%20Zug%2C%20Switzerland!5e0!3m2!1sen!2sug!4v1767509368527!5m2!1sen!2sug" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

</x-layouts.home>