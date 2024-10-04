<section class="hero-wrapper hero-1 text-center text-md-start">
  <div class="hero-slider-active">
    {{-- @dd(App\Models\BackgroundImage::where('slug', 'banner')->latest()->get()) --}}
    @foreach (App\Models\BackgroundImage::where('slug', 'banner')->latest()->get() as $item)
      <div class="single-slide">
        <div class="slide-bg bg-cover wow zoomIn" style="background-image: url('/storage/{{ $item->image }}' );">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12 col-xxl-8 col-lg-9 col-sm-10">
              <div class="hero-contents pe-lg-3 text-white">
                <h1 class="fs-lg animated" style="text-shadow: 2px 2px 5px black" data-animation-in="fadeInRight"
                  data-delay-in="0.3">RSUD <br> Kesehatan Kerja
                </h1>
                <p class="pe-lg-5 mb-4 animated" style="text-shadow: 2px 2px 5px black" data-animation-in="fadeInRight"
                  data-delay-in="0.6">PPID, memastikan
                  keterbukaan informasi Jembatan antara pemerintah dan masyarakat Kelola data dan dokumentasi dengan
                  transparan Patuhi UU Keterbukaan Informasi Publik Akses informasi publik menjadi lebih mudah.
                </p>
                <a href="/permohonan" data-animation-in="fadeInRight" data-delay-in="0.9"
                  class="theme-btn me-sm-4 mt-4 animated">Ajukan Permohonan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" width="44px" height="44px" id="circle"
      fill="none" stroke="currentColor">
      <circle r="20" cy="22" cx="22" id="quantechcircle" />
    </symbol>
  </svg>
</section>
