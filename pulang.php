<?php
include "bs_header.php";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand">Absen Pulang</a>
    <button class="btn btn-danger ml-auto" id="btnLogout">
      Logout
    </button>
  </div>
</nav>
<?php
include "form.php";
?>
<div class="form-group">
  <label for="status">Status</label>
  <input id="status" name="status" class="form-control" readonly value="Pulang" />
</div>
<?php
include "bs_footer.php";
?>