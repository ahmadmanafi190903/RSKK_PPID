function inputPhone() {
  document.getElementById('phone').addEventListener('input', function (event) {
    // Membatasi input hanya angka
    this.value = this.value.replace(/[^0-9]/g, '');

    // Membatasi maksimal 16 karakter
    if (this.value.length > 13) {
      this.value = this.value.slice(0, 13);
    }
  });
}

function inputNik() {
  document.getElementById('nik').addEventListener('input', function (event) {
    // Membatasi input hanya angka
    this.value = this.value.replace(/[^0-9]/g, '');

    // Membatasi maksimal 16 karakter
    if (this.value.length > 16) {
      this.value = this.value.slice(0, 16);
    }
  });
}

function inputNip() {
  document.getElementById('nip').addEventListener('input', function (event) {
    // Membatasi input hanya angka
    this.value = this.value.replace(/[^0-9]/g, '');

    // Membatasi maksimal 16 karakter
    if (this.value.length > 13) {
      this.value = this.value.slice(0, 13);
    }
  });
}