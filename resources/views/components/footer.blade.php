<footer class="footer-1 footer-wrap">
  <div class="footer-widgets-wrapper text-white bg-cover"
    style="background-image: url('/assets/img/footer-widgets-bg.png'); padding: 70px 0">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-sm-6 col-xl-3">
          <div class="about-quantech pe-md-5 pe-xl-0">
            <a href="index.html">
              <img src="{{ '/storage/' . App\Models\BackgroundImage::where('slug', 'logo')->latest()->first()->image }}" alt="quantech">
            </a>
            <p>PPID, memastikan
              keterbukaan informasi Jembatan antara pemerintah dan masyarakat Kelola data dan dokumentasi dengan
              transparan Patuhi UU Keterbukaan Informasi Publik Akses informasi publik menjadi lebih mudah.</p>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="single-footer-wid ps-xl-5">
            <div class="wid-title">
              <h3>Informasi</h3>
            </div>
            <ul>
              @foreach (App\Models\Informasi::get() as $item)
                <li><a href="{{ $item->url }}">{{ $item->nama }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="single-footer-wid ps-xl-2">
            <div class="wid-title">
              <h3>Media Sosial</h3>
            </div>
            <ul>
              @foreach (App\Models\Sosmed::all() as $item)
                <li><a href="{{ $item->link }}" target="_black">{{ $item->nama }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3">
          <div class="single-footer-wid site-info-widget">
            <div class="wid-title">
              <h3>Kontak Kami</h3>
            </div>
            <div class="get-in-touch">
              @foreach (App\Models\Contact::all() as $item)
                <div class="single-contact-info">
                  <div class="icon id1">
                    {!! $item->icon !!}
                  </div>
                  <div class="contact-info">
                    <span>{{ $item->address }}</span>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container align-items-center">
      <div class="bottom-content-wrapper">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="copy-rights">
              <p>&copy;2024 <strong>RSUD</strong> Kesehatan Kerja</p>
            </div>
          </div>
          <div class="col-md-6 mt-2 mt-md-0 col-12 text-md-end">
            <div class="social-links">
              @foreach (App\Models\Sosmed::all() as $item)
                <a href="{{ $item->link }}" target="_blank">{!! $item->icon !!}</a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
