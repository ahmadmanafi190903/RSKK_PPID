<div class="top-bar-wrapper d-none d-sm-block">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="top-left">
      <a href="tel:987-098-098-09"><i class="fal fa-phone-volume"></i>(022)7798778</a>
      <a href="mailto:info@example.com"><i class="fal fa-envelope"></i>rskk@jabarprov.go.id</a>
      <a href="https://maps.app.goo.gl/W9ruT9ZWGBh6242R6" target="_blank"><i class="fal fa-map-marker-alt"></i>Jl.Rancaekek
        No.Km.27, Nanjung Mekar, JABAR 40394</a>
    </div>
    <div class="top-right d-none d-md-block">
      <div class="social-pages">
        @foreach (App\Models\Sosmed::all() as $item)
          <a href="{{ $item->link }}" target="_blank">{!! $item->icon !!}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>
