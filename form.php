<?php
include "session.php";
?>

<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h2 class="text-center">Absensi Karyawan</h2>
      <h5 class="text-center">PT Kolangkaling tbk</h5>
    </div>
    <div class="card-body">
      <form method="post" id="absensiForm">
        <div id="responseMessage" class="mb-3"></div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input id="nama" name="nama" class="form-control" required readonly
            value="<?php echo $_SESSION['username']; ?>" />
        </div>
        <div class="form-group">
          <label for="departemen">Departemen</label>
          <input type="text" id="departemen" name="departemen" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="shift">Shift</label>
          <select id="shift" name="shift" class="form-control" required>
            <option value="" disabled selected>Pilih Shift</option>
            <option value="1">Shift 1</option>
            <option value="2">Shift 2</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input id="tanggal" name="tanggal" class="form-control" readonly />
        </div>
        <div class="form-group">
          <label for="jam">Jam Saat Ini</label>
          <input id="jam" name="jam" class="form-control" readonly />
        </div>
        <br>
        <button type="submit" id="btnSubmit" class="btn btn-primary btn-block" name="kirim">
          Kirim
        </button>