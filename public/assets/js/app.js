function toggleForm() {
  const selectElement = document.getElementById('kuasa');
  const hiddenForm = document.getElementById('hiddenForm');

  if (selectElement.value == "2") {
    hiddenForm.style.display = "block";
  } else {
    hiddenForm.style.display = "none";
  }
}

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