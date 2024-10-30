<x-mail::message>
  # Hallo {{ $nama }}

  <p>
    Kami ingin menginformasikan bahwa pengajuan keberatan yang Anda ajukan telah kami setujui.
  </p>

  <x-mail::button :url="config('app.url') . '/riwayat?email=' . $email" color="success">
    Cek
  </x-mail::button>

  Terima kasih,<br>
  {{ config('app.name') }}
</x-mail::message>