<x-mail::message>
  # Hallo {{ $nama }}

  <p>
    Terima kasih atas permohonan informasi yang telah Anda ajukan. Setelah melalui proses pemeriksaan, kami informasikan bahwa permohonan Anda tidak dapat kami setujui karena alasan berikut:
    <br>
    {{ $pesan_ditolak }}
  </p>

  <x-mail::button :url="config('app.url') . '/riwayat?email=' . $email" color="success">
    Cek
  </x-mail::button>

  Terima kasih,<br>
  {{ config('app.name') }}
</x-mail::message>