<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; agOes 2023</div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateClock() {
        const currentTime = new Date();
        const hours = currentTime.getHours();
        const minutes = currentTime.getMinutes();
        const seconds = currentTime.getSeconds();

        const formattedTime = `${hours}:${minutes}:${seconds}`;
        document.getElementById('current-time').textContent = formattedTime;
    }

    // Memanggil fungsi updateClock() setiap detik
    setInterval(updateClock, 1000);

    // Memanggilnya untuk pertama kali agar jam saat ini tampil segera
    updateClock();
</script>
<script>
    document.getElementById("btnLogout").addEventListener("click", function () {
        // Redirect ke halaman masuk.php
        window.location.href = "logout.php";
    });
</script>
</body>

</html>