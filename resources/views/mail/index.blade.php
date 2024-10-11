<x-mail::message>
  # Hallo {{ $nama }}

  <p>
    Kami ingin menginformasikan bahwa permohonan informasi yang Anda ajukan telah kami setujui. Untuk bukti
    penerimaan, bisa klik tombol di bawah ini.
  </p>


  <x-mail::button :url="config('app.url') . '/permohonan-informasi/' . $id . '/download'" color="success">
    Dapatkan Informasi
  </x-mail::button>

  Terimakasih,<br>
  {{ config('app.name') }}
</x-mail::message>
