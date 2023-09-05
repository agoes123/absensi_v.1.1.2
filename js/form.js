// Fungsi untuk memperbarui nilai input jam dan tanggal saat ini
function updateJamSaatIni() {
  const now = new Date();
  const options = {
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
    hour12: false,
  };
  const formattedDate = now.toLocaleString("en-GB", options);

  const [formattedTanggal, formattedJam] = formattedDate.split(", ");

  document.getElementById("tanggal").value = formattedTanggal;
  document.getElementById("jam").value = formattedJam;
}

// Fungsi untuk menampilkan pesan sukses atau error
function showResponseMessage(message, isError = false) {
  const messageClass = isError ? "alert-danger" : "alert-success";
  const messageElement = `<div class="alert ${messageClass}">${message}</div>`;
  $("#responseMessage").html(messageElement);
}

// Fungsi untuk mengirim data absensi
async function sendAbsensiData(formData) {
  const scriptURL =
    "https://script.google.com/macros/s/AKfycbzWBR3hGWARQ5YYJf1RYHSE29eKoxksZf-wxBkXbLzTNF6UOxS8ZbV5YS2NbHtVjzQR/exec";

  try {
    const response = await fetch(scriptURL, {
      method: "POST",
      body: formData,
    });

    if (response.ok) {
      $("#absensiForm")[0].reset();
      showResponseMessage("Data berhasil dikirim.");
    } else {
      throw new Error("Gagal mengirim data.");
    }
  } catch (error) {
    showResponseMessage("Data gagal terkirim!", true);
  }
}

// Panggil fungsi saat halaman dimuat
$(document).ready(function () {
  updateJamSaatIni();
  setInterval(updateJamSaatIni, 1000);

  const absensiForm = document.querySelector("#absensiForm");

  absensiForm.addEventListener("submit", async function (event) {
    event.preventDefault(); // Mencegah pengiriman formulir

    const departemen = $("#departemen").val();
    const shift = $("#shift").val();

    if (!departemen || !shift) {
      showResponseMessage("Data Tidak Lengkap", true);
    } else {
      const formData = new FormData(absensiForm);
      formData.append("nama", $("#nama").val());
      sendAbsensiData(formData);
    }
  });
});
