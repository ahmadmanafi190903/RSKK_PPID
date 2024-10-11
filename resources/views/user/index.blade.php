@extends('layouts.app')

@section('content')
  @include('components.hero')

  <section class="our-service-wrapper section-padding">
    <div class="container">
      <div class="col-12 col-xl-6 offset-xl-3 text-center">
				<div class="section-title">
					<span>RSUD KK</span>
					<h2>Informasi Publik</h2>
				</div>
			</div>
      <div class="row ps-xl-5 pe-xl-5">
        @foreach ($cards as $item )
          <div class="col-xl-3 col-md-6 col-12">
            <div class="single-service-box">
              <div class="icon">
                <img src="/storage/{{ $item->icon }}" alt="{{ $item->judul }}" width="72">
              </div>
              <h4><a href="{{ $item->url }}">{{ $item->judul }}</a></h4>
              <p>{{ $item->deskripsi }}</p>
              <a href="{{ $item->url }}" class="read-more-link">Selengkapnya</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="about-wrapper section-padding pt-0">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-12">
          <div class="about-images-video-popup mb-5 mb-md-0">
            <img src="/storage/{{ App\Models\BackgroundImage::where('slug', 'thumbnail')->latest()->first()->image }}" alt="" width="600">
            <img src="/storage/{{ App\Models\BackgroundImage::where('slug', 'thumbnail')->latest()->skip(1)->first()->image }}" alt="" width="380">
            <div class="video-play-btn">
              <a href="{{ $video->url }}" class="popup-video play-video"><i
                  class="fas fa-play"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-12 ps-xl-5">
          <div class="section-title">
            <span>RSUD KK</span>
            <h2>Layanan Informasi yang Mudah dan Transparan</h2>
            <p>RSUD Kesehatan Kerja Provinsi Jawa Barat berkomitmen untuk memberikan layanan yang inovatif dan mudah
              diakses bagi masyarakat. Kami mendukung kebutuhan informasi publik dengan solusi teknologi modern untuk
              meningkatkan transparansi dan kualitas layanan.</p>
          </div>

          <div class="row">
            @foreach ($infoForms as $item)
              <div class="col-md-6 col-sm-6">
                <div class="info-icon-item">
                  <img src="/storage/{{ $item->icon }}" alt="{{ $item->judul }}" width="72">
                  <h3>{{ $item->judul }}</h3>
                  <p>{{ $item->deskripsi }}</p>
                  <a href="{{ $item->url }}" class="theme-btn mt-30">{{ $item->nama_button }}</a>
                </div>
              </div>
            @endforeach
            {{-- <div class="col-md-6 col-sm-6">
              <div class="info-icon-item">
                <img src="assets/img/icons/settings.svg" alt="">
                <h3>Form Permohonan Keberatan Informasi</h3>
                <p>Jika Anda merasa ada informasi yang kurang jelas atau permohonan informasi tidak terpenuhi, ajukan
                  keberatan Anda melalui form ini.</p>
                <a href="/pengajuan" class="theme-btn mt-30">Ajukan Keberatan</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="faq-wrapper left-bg-overlay section-padding bg-gradient">
    <div class="shape-top"><img src="assets/img/top-shape.png" alt=""></div>
    <div class="shape-bottom"><img src="assets/img/left-bottom-shape.png" alt=""></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-12 mb-5 mb-xl-0">
          <div class="faq-img">
            <img src="/storage/{{ App\Models\BackgroundImage::where('slug', 'q&a')->latest()->first()->image }}" alt="q&a">
          </div>
        </div>
        <div class="col-xl-6 col-12 ps-xl-5">
          <div class="section-title">
            <span>RSUK KK</span>
            <h2>Pertanyaan yang sering ditanyakan</h2>
          </div>
          <div class="faq-accordion">
            <div class="accordion" id="accordion">
              @foreach (App\Models\QuestAnswar::all() as $key => $item)
                <div class="accordion-item">
                  <h4 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#faq{{ $key }}" aria-controls="faq{{ $key }}">
                      {{ $item->judul }}
                    </button>
                  </h4>
                  <div id="faq{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                      {{ $item->deskripsi }}
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section class="best-services-wrapper section-padding">
		<div class="container">
			<div class="col-12 col-xl-6 offset-xl-3 text-center">
				<div class="section-title">
					<span>Our Services</span>
					<h2>We Offer a Wide Variety of IT Services</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service-left-icon">
						<div class="icon">
							<img src="assets/img/icons/desktop.png" alt="">
						</div>
						<div class="content">
							<h4><a href="services-details.html">Web Development</a></h4>
							<p>We carry more than just good coding skills. Our experience makes us stand out from other
								web development.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service-left-icon">
						<div class="icon">
							<img src="assets/img/icons/mobile.png" alt="">
						</div>
						<div class="content">
							<h4><a href="services-details.html">App Development</a></h4>
							<p>We carry more than just good coding skills. Our experience makes us stand out from other
								web development.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service-left-icon">
						<div class="icon">
							<img src="assets/img/icons/ux.png" alt="">
						</div>
						<div class="content">
							<h4><a href="services-details.html">UI/UX Design</a></h4>
							<p>Build the product you need on time with an experienced team that uses a clear and
								effective design process.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service-left-icon">
						<div class="icon">
							<img src="assets/img/icons/qa.png" alt="">
						</div>
						<div class="content">
							<h4><a href="services-details.html">QA & Testing</a></h4>
							<p>Turn to our experts to perform compr ehensive, multi-stage testing and au
								dicing of your software.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service-left-icon">
						<div class="icon">
							<img src="assets/img/icons/stock.png" alt="">
						</div>
						<div class="content">
							<h4><a href="services-details.html">IT Consultancy</a></h4>
							<p>We carry more than just good coding skills. Our experience makes us stand out from other
								web development.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6 col-12">
					<div class="single-service-left-icon">
						<div class="icon">
							<img src="assets/img/icons/web.png" alt="">
						</div>
						<div class="content">
							<h4><a href="services-details.html">Dedicated Team</a></h4>
							<p>Over the past decade, our customers succeeded by leveraging Intellect soft's process of
								building, motivating.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 mt-50 text-center">
				<a href="services.html" class="theme-btn">All Services</a>
			</div>
		</div>
	</section> --}}

  {{-- <section class="project-carousel-wrapper pt-0 section-padding">
		<div class="container">
			<div class="row align-center">
				<div class="col-md-8 col-xl-6 text-center text-md-start">
					<div class="section-title">
						<span>Our Completed Projects</span>
						<h2>Improve and Enhance Our Tech Projects</h2>
					</div>
				</div>
				<div class="col-md-4 col-xl-6">
					<div class="case-study-carousel-arrow text-md-end">
						<div class="project-carousel-nav-prev me-2"><i class="fal fa-arrow-left"></i></div>
						<div class="project-carousel-nav-next"><i class="fal fa-arrow-right"></i></div>
					</div>
				</div>
			</div>

			<div class="project-showcase-carousel-active text-white">
				<div class="single-project-card bg-cover" style="background-image: url('assets/img/project/1.jpg')">
					<a href="project-details.html" class="plus-link"><i class="fal fa-plus"></i></a>
					<div class="content">
						<h3>Mobile Apps</h3>
						<p>Design</p>
					</div>
				</div>
				<div class="single-project-card bg-cover" style="background-image: url('assets/img/project/2.jpg')">
					<a href="project-details.html" class="plus-link"><i class="fal fa-plus"></i></a>
					<div class="content">
						<h3>Web Application</h3>
						<p>Development</p>
					</div>
				</div>
				<div class="single-project-card bg-cover" style="background-image: url('assets/img/project/3.jpg')">
					<a href="project-details.html" class="plus-link"><i class="fal fa-plus"></i></a>
					<div class="content">
						<h3>Online Games</h3>
						<p>Game</p>
					</div>
				</div>
				<div class="single-project-card bg-cover" style="background-image: url('assets/img/project/4.jpg')">
					<a href="project-details.html" class="plus-link"><i class="fal fa-plus"></i></a>
					<div class="content">
						<h3>Mobile Apps</h3>
						<p>Design</p>
					</div>
				</div>
				<div class="single-project-card bg-cover" style="background-image: url('assets/img/project/5.jpg')">
					<a href="project-details.html" class="plus-link"><i class="fal fa-plus"></i></a>
					<div class="content">
						<h3>Mobile Apps</h3>
						<p>Design</p>
					</div>
				</div>
				<div class="single-project-card bg-cover" style="background-image: url('assets/img/project/6.jpg')">
					<a href="project-details.html" class="plus-link"><i class="fal fa-plus"></i></a>
					<div class="content">
						<h3>Mobile Apps</h3>
						<p>Design</p>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

  {{-- <section class="video-cta-wrapper bg-cover section-padding"
		style="background-image: url('assets/img/video-cta-bg.jpeg')">
		<div class="container">
			<div class="col-12 offset-xl-2 col-xl-8 offset-md-1 col-md-10 text-center">
				<div class="content-warpper mb-55">
					<div class="video-play-btn mb-40">
						<a href="https://www.youtube.com/watch?v=K02pM-yQLGE" class="popup-video play-video"><i
								class="fas fa-play"></i></a>
					</div>
					<h1 class="text-white">Preparing For Your Success
						Provide Best IT Solutions.</h1>
					<p class="text-white">Appropriate for your specific business, making it easy <br> for
						you to have quality IT services.</p>
					<a href="contact.html" class="theme-btn mt-5">Contact us</a>
				</div>
			</div>
		</div>
	</section> --}}

  {{-- <section class="fun-counter-wrapper text-white">
		<div class="container">
			<div class="row ps-md-5 pe-md-5">
				<div class="col-lg-6">
					<div class="single-fun-counter bg-cover" style="background-image: url('assets/img/home1/counter-bg-1.jpg')">
						<div class="count"><span>32</span>+</div>
						<div class="content">
							<h3>Countries Worldwide</h3>
							<p>To succeed, every software solution must be deeply integrated
								into the existing tech environment..</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="single-fun-counter mt bg-cover"
						style="background-image: url('assets/img/home1/counter-bg-2.jpg')">
						<div class="count"><span>23</span>k</div>
						<div class="content">
							<h3>Happy Customers</h3>
							<p>To succeed, every software solution must be deeply integrated
								into the existing tech environment..</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}

  <section class="testimonial-carousel-wrapper section-padding">
    <div class="container">
      <div class="col-12 col-xl-8 offset-xl-2 text-center">
        <div class="section-title">
          <span>RSUD KK</span>
          <h2>Rating</h2>
        </div>
      </div>

      <div class="testimonial-carousel-grid-active">
        @foreach ($ratings as $item)
          <div class="single-testimonial-card">
            <div class="client-img bg-cover" style="background-image: url('assets/img/pp_rating.webp')"></div>
            <div class="content">
              <p>{{ $item->comment }}</p>
              <div class="client-rating mt-15">
                @for ($i = 0; $i < $item->star; $i++)
                  <i class="fas fa-star"></i>
                @endfor
              </div>
              <h4>{{ $item->pemohon->nama }}</h4> {{-- Nama --}}
              <span>{{ $item->pemohon->pekerjaan }}</span> {{-- pekerjaan --}}
            </div>
          </div>
        @endforeach
        {{-- <div class="single-testimonial-card">
          <div class="client-img bg-cover" style="background-image: url('assets/img/36.jpg')"></div>
          <div class="content">
            <p>Sangat puas dengan sistem yang transparan dan mudah diakses. Setiap pertanyaan saya ditanggapi dengan ramah
              dan informatif.</p>
            <div class="client-rating mt-15">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>Fikri Amrullah</h4>
            <span>Developer, Backend.</span>
          </div>
        </div>
        <div class="single-testimonial-card">
          <div class="client-img bg-cover" style="background-image: url('assets/img/35.jpg')"></div>
          <div class="content">
            <p>Pelayanan bagus, meskipun ada sedikit keterlambatan dalam merespon. Namun, informasi yang diberikan akurat.
            </p>
            <div class="client-rating mt-15">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>Randy Fajar</h4>
            <span>UI UX, Entrepreneur.</span>
          </div>
        </div>
        <div class="single-testimonial-card">
          <div class="client-img bg-cover" style="background-image: url('assets/img/37.jpg')"></div>
          <div class="content">
            <p>Sistem PPID sangat membantu dalam mendapatkan informasi yang saya perlukan. Prosesnya mudah dan cepat.</p>
            <div class="client-rating mt-15">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>Nida Adawiah</h4>
            <span>Founder, CEO.</span>
          </div>
        </div>
        <div class="single-testimonial-card">
          <div class="client-img bg-cover" style="background-image: url('assets/img/38.jpg')"></div>
          <div class="content">
            <p>Pelayanan cukup baik, tetapi ada ruang untuk peningkatan terutama dalam hal kecepatan respon.</p>
            <div class="client-rating mt-15">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>Aulia</h4>
            <span>Public Relations.</span>
          </div>
        </div>
        <div class="single-testimonial-card">
          <div class="client-img bg-cover" style="background-image: url('assets/img/icons/Logo-RSKK-2.ico')"></div>
          <div class="content">
            <p>Sangat puas! Layanan informasi yang disediakan sangat transparan dan mudah dipahami. Stafnya juga sangat
              membantu.</p>
            <div class="client-rating mt-15">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4>RSUD KK</h4>
            <span>RS kesehatan Kerja JABAR.</span>
          </div>
        </div> --}}

      </div>
    </div>
  </section>

  {{-- <section class="team-experts-wrapper section-padding section-bg">
    <div class="container">
      <div class="col-12 col-xl-6 offset-xl-3 col-md-8 offset-md-2 text-center">
        <div class="section-title">
          <span>Our Amazing Team</span>
          <h2>We have Well Experience
            Team Members</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-xl-3">
          <div class="single-team-member text-white bg-cover" style="background-image: url('assets/img/team/5.jpg')">
            <div class="member-info">
              <h4><a href="team-details.html">Asish Patil</a></h4>
              <p>Founder & Ceo</p>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="single-team-member text-white bg-cover" style="background-image: url('assets/img/team/2.jpg')">
            <div class="member-info">
              <h4><a href="team-details.html">D. Maria Poddar</a></h4>
              <p>Designer</p>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="single-team-member active text-white bg-cover"
            style="background-image: url('assets/img/team/3.jpg')">
            <div class="member-info">
              <h4><a href="team-details.html">Salman Ahmed</a></h4>
              <p>Developer</p>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="single-team-member text-white bg-cover" style="background-image: url('assets/img/team/4.jpg')">
            <div class="member-info">
              <h4><a href="team-details.html">RS Rahul</a></h4>
              <p>Marketer</p>
              <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <section class="our-news-section section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="section-title">
            <span>RSUD KK</span>
            <h2>Berita</h2>
          </div>
        </div>
      </div>

      <div class="row">
        @foreach ($news as $item)
          <div class="col-xl-4 col-md-6">
            <div class="single-blog-item">
              <div class="post-featured-thumb bg-cover" style="background-image: url('/storage/{{ $item->image }}')"></div>
              <div class="content">
                <h3><a href="{{ $item->url }}">{{ $item->judul }}</a></h3>
                <p>{{ $item->deskripsi }}</p>
                <div class="post-meta d-flex align-items-center">
                  <div class="post-date">
                    <i class="fal fa-calendar-alt"></i>
                    {{ $item->created_at->locale('id')->translatedFormat('H:i, l, d F Y') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- <section class="cta-banner-wrapper">
    <div class="container">
      <div class="cta-banner-box section-padding bg-cover"
        style="background-image: url('assets/img/cta-banner-bg.jpeg')">
        <div class="row align-center">
          <div class="col-xl-7 text-center text-xl-start offset-xl-1 offset-xl-1">
            <div class="section-title mb-0">
              <span>Get A Quote</span>
              <h2 class="mb-md-0">Need Any Consultations or <br> Work Next Projects</h2>
            </div>
          </div>
          <div class="col-xl-4 mt-4 mt-xl-0 text-center">
            <a href="contact.html" class="theme-btn">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
@endsection
