import "./bootstrap";

// Start Fungsi untuk penambahan angka
document.addEventListener("DOMContentLoaded", function () {
    // Pilih semua elemen dengan kelas "counter"
    const counters = document.querySelectorAll(".counter");

    // Buat IntersectionObserver untuk memantau kapan elemen muncul di layar
    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                // Periksa apakah elemen terlihat di layar
                if (entry.isIntersecting) {
                    const counter = entry.target; // Ambil elemen counter
                    const target = +counter.getAttribute("data-target"); // Ambil angka target dari atribut data
                    const duration = 2000; // Durasi animasi dalam milidetik
                    const start = 0; // Mulai counter dari 0
                    let startTime = null; // Inisialisasi waktu mulai

                    // Fungsi untuk memperbarui nilai counter
                    const updateCounter = (currentTime) => {
                        if (!startTime) startTime = currentTime; // Tetapkan waktu mulai
                        const elapsedTime = currentTime - startTime; // Hitung waktu yang telah berlalu
                        const progress = Math.min(elapsedTime / duration, 1); // Hitung kemajuan (0 hingga 1)
                        counter.textContent =
                            Math.floor(progress * target) + "+"; // Perbarui teks konten counter
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter); // Lanjutkan animasi jika belum selesai
                        } else {
                            counter.textContent = target + "+"; // Tetapkan nilai akhir setelah animasi selesai
                        }
                    };

                    requestAnimationFrame(updateCounter); // Mulai animasi
                    observer.unobserve(counter); // Berhenti mengamati setelah animasi selesai
                }
            });
        },
        { threshold: 0.1 } // Memicu ketika 10% elemen terlihat di layar
    );

    // Amati setiap elemen counter
    counters.forEach((counter) => observer.observe(counter));
});
// End Fungsi untuk penambahan angka

// Start Fungsi Form
const scriptURL =
    "https://script.google.com/macros/s/AKfycbwK8LUEaY_UUePFS483b-4sGNcE2T8PUdb4EItAl2OGc1xq_fu0cvA486LB-E70AMGwkg/exec";
const forms = document.querySelectorAll('form[name="submit-to-google-sheet"]'); // Menangkap semua form dengan nama yang sama

forms.forEach((form) => {
    const submitButton = form.querySelector('button[type="submit"]');
    const alertBox = document.createElement("div"); // Elemen untuk alert
    alertBox.style.position = "relative";
    alertBox.style.left = "50%";
    alertBox.style.transform = "translateX(-50%)";
    alertBox.style.bottom = "-1em"; // Posisi alert di bawah form, tidak menimpa tombol
    alertBox.style.marginTop = "";
    alertBox.style.width = "100%";
    alertBox.style.textAlign = "start";
    alertBox.style.zIndex = "10"; // Agar alert berada di depan elemen lain

    // Tambahkan relative positioning pada container form untuk alert yang posisinya absolute
    form.style.position = "relative";
    form.style.paddingBottom = "1em"; // Beri ruang di bawah form untuk alert

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        // Ubah tombol submit menjadi loading
        submitButton.innerHTML = `
        <div role="status" class="flex items-center space-x-2">
            <div>
                <svg aria-hidden="true" class="inline w-4 h-4 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
            </div>
            <div>Loading</div>
            <span class="sr-only">Loading...</span>
        </div>`;

        submitButton.disabled = true;
        submitButton.classList.add("cursor-not-allowed");

        // Kirim data ke Google Sheet
        fetch(scriptURL, { method: "POST", body: new FormData(form) })
            .then((response) => {
                // Tampilkan alert sukses
                alertBox.innerHTML =
                    '<div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg flex items-center space-x-2" role="alert"><div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16"><path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/></svg></div><div>Pesan berhasil dikirim!<div></div>';
                form.appendChild(alertBox);

                // Tangkap data input dari form
                const nama = form.querySelector('input[name="nama"]').value;
                const judul = form.querySelector('input[name="judul"]').value;
                const pesan = form.querySelector('input[name="pesan"]').value;

                // Format pesan untuk WhatsApp
                const whatsappMessage = `Halo Admin, Nama Saya ${nama}\nTopik yang ingin saya bicarakan: ${judul}\nPesan: ${pesan}`;
                // Redirect ke WhatsApp Admin (ganti nomor admin dengan yang sesuai)
                const whatsappURL = `https://api.whatsapp.com/send?phone=6281521550913&text=${encodeURIComponent(
                    whatsappMessage
                )}`;
                window.location.href = whatsappURL;

                // Reset form setelah sukses submit
                form.reset();

                // Kembalikan tombol submit ke bentuk awal
                submitButton.innerHTML = "Kirim Pesan";
                submitButton.disabled = false;
                submitButton.classList.remove("cursor-not-allowed");
            })
            .catch((error) => {
                // Tampilkan alert error
                alertBox.innerHTML =
                    '<div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg flex items-center space-x-2" role="alert"><div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16"><path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/></svg></div><div>Pesan gagal dikirim!<div></div>';
                form.appendChild(alertBox);

                // Kembalikan tombol submit ke bentuk awal
                submitButton.innerHTML = "Kirim Pesan";
                submitButton.disabled = false;
                submitButton.classList.remove("cursor-not-allowed");

                console.error("Error!", error.message);
            });
    });
});
// End Fungsi Form
