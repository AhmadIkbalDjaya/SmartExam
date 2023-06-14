// Waktu akhir hitungan mundur (HH, MM, SS)
var countdownTime = new Date().setHours(0, 60, 0); // Mengatur waktu akhir ke pukul 23:59:59

// Memperbarui hitungan mundur setiap detik
var countdown = setInterval(function () {
    // Dapatkan tanggal dan waktu saat ini
    var now = new Date().getTime();

    // Hitung selisih antara sekarang dan waktu hitungan mundur
    var distance = countdownTime - now;

    // Hitung waktu untuk jam, menit, dan detik
    var hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Tampilkan hasil dalam elemen dengan id "countdown"
    document.getElementById("countdown").innerHTML =
        hours + " : " + minutes + " : " + seconds + "";

    // Hentikan hitungan mundur ketika waktu hitungan mundur telah berakhir
    if (distance < 0) {
        clearInterval(countdown);
        document.getElementById("countdown").innerHTML = "Waktu Berakhir";
    }
}, 1000); // Set interval ke 1 detik (1000 milidetik)
