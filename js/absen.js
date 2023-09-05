document.addEventListener("DOMContentLoaded", function () {
  const masukButton = document.getElementById("Masuk");
  const lemburButton = document.getElementById("Lembur");
  const pulangButton = document.getElementById("Pulang");

  masukButton.addEventListener("click", function () {
    window.location.href = "masuk.php";
  });

  lemburButton.addEventListener("click", function () {
    window.location.href = "lembur.html";
  });

  pulangButton.addEventListener("click", function () {
    window.location.href = "pulang.html";
  });
});
