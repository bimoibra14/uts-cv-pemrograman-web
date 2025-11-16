<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - <?= $personal['full_name'] ?? 'Nama Saya' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* ============================== */
        /* CSS UNTUK TOMBOL THEME TOGGLE */
        /* ============================== */
        .navbar-right-controls {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-left: auto; /* Mendorong semua ke kanan */
        }
        .theme-switcher {
            font-size: 1.3rem;
            color: var(--secondary-text-dark);
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .theme-switcher:hover {
            color: var(--light-text);
        }
        /* Sembunyikan ikon matahari di mode gelap (default) */
        .theme-switcher .bi-sun-fill {
            display: none;
        }
        .theme-switcher .bi-moon-fill {
            display: inline-block;
        }

        /* ============================== */
        /* STYLE UNTUK LIGHT MODE       */
        /* ============================== */
        
        /* Saat body memiliki class .light-mode, ganti variabel ini */
        body.light-mode {
            --dark-gray-bg: #f4f7f6; /* Latar body jadi abu-abu muda */
            --light-text: #1a1a1a; /* Teks utama jadi hitam */
            --secondary-text-dark: #555555; /* Teks sekunder jadi abu-abu gelap */
            --header-bg: #ffffff; /* Navbar & Card jadi putih */
            --border-color: #e0e0e0; /* Border jadi abu-abu muda */
        }

        /* Tampilkan ikon matahari & sembunyikan bulan di mode terang */
        body.light-mode .theme-switcher .bi-sun-fill {
            display: inline-block;
        }
        body.light-mode .theme-switcher .bi-moon-fill {
            display: none;
        }
        body.light-mode .theme-switcher:hover {
            color: var(--primary-cyan); /* Warna hover di mode terang */
        }
        
        /* Penyesuaian lain untuk mode terang */
        body.light-mode .top-navbar .nav-menu .nav-link:hover,
        body.light-mode .top-navbar .nav-menu .nav-link.active {
            color: var(--primary-cyan); /* Link aktif jadi cyan */
        }
        body.light-mode .side-socials a:hover {
            color: var(--primary-cyan);
        }

        /* Foto di panel kiri (mode terang) */
        body.light-mode .hero-profile-photo {
            filter: none; /* Hapus filter grayscale */
            mix-blend-mode: normal; /* Hapus blending */
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); /* Shadow normal */
        }
        body.light-mode .hero-text-overlay h2 {
            color: var(--black-pure); /* Teks nama jadi hitam */
            text-shadow: 1px 1px 3px rgba(255,255,255,0.5);
        }
        
        /* Tombol accordion (mode terang) */
        body.light-mode .accordion-button:not(.collapsed) {
            color: var(--light-text); /* Teks jadi putih (di atas bg cyan) */
        }
        body.light-mode .accordion-button:not(.collapsed)::after {
            filter: invert(1); /* Panah jadi putih */
        }
        body.light-mode .accordion-button::after {
            filter: invert(0); /* Panah kembali normal */
        }

        /* Timeline (mode terang) */
        body.light-mode .timeline-item::before {
            border-color: var(--dark-gray-bg); /* Sesuaikan border dot dgn bg body */
        }
        /* ============================== */
        /* SKEMA WARNA (DARK MODE)    */
        /* ============================== */
        :root {
            --primary-color: #0d6efd;
            --accent-color: #8c82ff; /* Warna aksen ungu/biru terang */
            --dark-bg-1: #1a1a1a;
            --dark-bg-2: #222222;
            --dark-bg-3: #333333;
            --text-color-light: #e0e0e0;
            --heading-color-light: #ffffff;
            --secondary-text: #b0b0b0;
            --border-color-dark: #444444;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg-1);
            color: var(--text-color-light);
            line-height: 1.7;
        }
        
        /* ============================== */
        /* NAVBAR                     */
        /* ============================== */
        .navbar {
            background-color: var(--dark-bg-2);
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
            padding: 0.75rem 1rem;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--heading-color-light);
            font-weight: 600;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        .navbar-brand:hover { color: var(--primary-color); }
        .navbar-profile-photo {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent-color);
            box-shadow: 0 0 0 2px rgba(140, 130, 255, 0.4);
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }
        .navbar-profile-photo:hover {
            transform: scale(1.1) rotate(15deg);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px var(--primary-color);
        }
        .navbar-nav .nav-link {
            font-weight: 500;
            color: var(--secondary-text);
            transition: all 0.3s ease-in-out;
            position: relative;
            padding: 10px 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .navbar-nav .nav-link:hover {
            color: var(--heading-color-light);
            transform: translateY(-2px);
        }
        .navbar-nav .nav-link.active {
            color: var(--primary-color);
            font-weight: 700;
        }
        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0px;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
            animation: navLinkUnderline 0.4s forwards;
        }
        @keyframes navLinkUnderline {
            from { width: 0; }
            to { width: 100%; }
        }

        /* ============================== */
        /* HERO SECTION (FULL-WIDTH)    */
        /* ============================== */
        .hero-section {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh; /* Buat lebih tinggi, 90% dari viewport */
            background-color: var(--dark-bg-2); /* Latar belakang hero */
            color: var(--heading-color-light);
            padding: 5rem 0; /* Padding atas/bawah */
            overflow: hidden;
            /* PROPERTI YANG DIHAPUS: border-radius, margin-bottom, box-shadow */
            /* PROPERTI BARU: */
            box-shadow: 0 5px 15px rgba(0,0,0,0.4); /* Shadow hanya di bawah (seperti navbar) */
        }
        
        .hero-content {
            flex: 1;
            padding: 0; /* Padding sekarang diatur oleh container-fluid */
            z-index: 2;
            text-align: left;
        }
        .hero-greeting {
            font-size: 1.1rem;
            color: var(--secondary-text);
            margin-bottom: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 1px solid var(--border-color-dark);
            padding-bottom: 5px;
            display: inline-block;
        }
        .hero-section h1 {
            font-size: 4.5rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 20px;
        }
        .hero-section .lead {
            font-size: 1.5rem;
            color: var(--accent-color);
            font-weight: 500;
            margin-bottom: 30px;
        }
        /* ============================== */
/* HERO SECTION (MODIFIKASI GAMBAR) */
/* ============================== */

/* Ubah .hero-image-container */
.hero-image-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    z-index: 1;
    /* Tambahkan padding kanan untuk jarak dari tepi jika diperlukan */
    padding-right: 50px; /* Sesuaikan nilai ini */
}

/* Modifikasi .hero-image-wrapper */
.hero-image-wrapper {
    position: relative;
    width: 400px; /* Ukuran gambar yang lebih lebar */
    height: 500px; /* Ukuran gambar yang lebih tinggi */
    /* border-radius: 50%; <--- HAPUS ini untuk membuat persegi panjang */
    border-radius: 10px; /* Contoh border radius sedikit untuk sudut halus, atau hapus jika ingin benar-benar tajam */
    overflow: hidden;
    /* border: 5px solid var(--primary-color); <--- HAPUS ini untuk menghilangkan bingkai */
    /* box-shadow: 0 0 0 10px rgba(13, 110, 253, 0.3); <--- HAPUS ini untuk menghilangkan shadow */
    transition: transform 0.5s ease-in-out;
}

.hero-image-wrapper:hover {
    transform: scale(1.02); /* Sedikit membesar saja saat hover */
    /* box-shadow: 0 0 0 15px var(--accent-color); <--- HAPUS ini */
}

/* Modifikasi .hero-image */
.hero-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top; /* Pastikan wajah tetap di atas */
}

/* Responsive untuk gambar */
@media (max-width: 992px) {
    .hero-image-wrapper {
        width: 300px;
        height: 380px;
    }
    .hero-image-container {
        padding-right: 0; /* Hapus padding kanan di mobile */
    }
}
@media (max-width: 768px) {
    .hero-image-wrapper {
        width: 250px;
        height: 320px;
    }
}

        /* Elemen Dekoratif Lingkaran */
        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            z-index: 0;
        }
        .circle-1 {
            width: 150px; height: 150px;
            top: 10%; left: 5%;
            background-color: rgba(255, 255, 255, 0.05);
        }
        .circle-2 {
            width: 200px; height: 200px;
            bottom: 15%; right: 0%;
            background-color: rgba(140, 130, 255, 0.1);
        }
        .circle-3 {
            width: 80px; height: 80px;
            top: 30%; right: 20%;
            background-color: rgba(255, 255, 255, 0.03);
        }

        .hero-section .contact-links {
            margin-top: 50px;
            text-align: left;
        }
        .hero-section .contact-links .btn {
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 1rem;
            margin: 0 10px 10px 0;
            transition: all 0.3s ease;
            border: 2px solid var(--primary-color);
            background-color: var(--primary-color);
            color: white;
        }
        .hero-section .contact-links .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.4);
            background-color: transparent;
            color: var(--primary-color);
        }
        .hero-section .contact-links .btn i { margin-right: 8px; }

        /* ============================== */
        /* KONTEN UTAMA LAINNYA (BOXED) */
        /* ============================== */
        .section-container {
            max-width: 900px; /* Lebar maksimal konten "boxed" */
            margin: 0 auto;
            padding: 0 15px;
        }
        .section-title {
            font-weight: 700;
            color: var(--heading-color-light);
            margin-bottom: 35px;
            padding-bottom: 10px;
            border-bottom: 3px solid var(--accent-color);
            display: inline-block;
            position: relative;
            animation: fadeInRight 1s ease-out forwards;
            opacity: 0;
            font-size: 2.2rem;
            /* Jarak atas untuk section pertama setelah hero */
            margin-top: 50px; 
        }
        .section:nth-child(odd) .section-title { animation-delay: 0.2s; }
        .section:nth-child(even) .section-title { animation-delay: 0.4s; }

        /* Accordion (Pendidikan) */
        .accordion-item {
            background-color: var(--dark-bg-2);
            border: 1px solid var(--border-color-dark);
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        .accordion-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        .accordion-button {
            font-weight: 600;
            font-size: 1.05rem;
            padding: 18px 25px;
            background-color: var(--dark-bg-2);
            color: var(--heading-color-light);
            border-radius: 10px !important;
            transition: all 0.3s ease;
        }
        .accordion-button:hover { background-color: var(--dark-bg-3); }
        .accordion-button:focus { box-shadow: none; }
        .accordion-button:not(.collapsed) {
            background-color: var(--primary-color);
            color: #ffffff;
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
        }
        .accordion-button::after {
             background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        .accordion-button:not(.collapsed)::after {
             background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }
        .accordion-body { padding: 20px 25px; font-size: 0.95rem; color: var(--text-color-light); }

        /* Vertical Timeline (Pengalaman & Organisasi) */
        .timeline {
            position: relative;
            padding-left: 50px;
            list-style: none;
            margin-left: 0;
            padding-right: 0;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: var(--border-color-dark);
            border-radius: 2px;
        }
        .timeline-item {
            position: relative;
            margin-bottom: 35px;
            background: var(--dark-bg-2);
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border-left: 5px solid var(--accent-color);
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }
        .timeline-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            border-color: var(--primary-color);
        }
        .timeline-item:nth-child(1) { animation-delay: 0.3s; }
        .timeline-item:nth-child(2) { animation-delay: 0.5s; }
        .timeline-item:nth-child(3) { animation-delay: 0.7s; }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -38px;
            top: 25px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: var(--primary-color);
            border: 5px solid var(--dark-bg-1);
            z-index: 1;
            box-shadow: 0 0 0 2px var(--primary-color);
        }
        .timeline-date {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 8px;
            display: block;
        }
        .timeline-title {
            font-weight: 700;
            color: var(--heading-color-light);
            margin-bottom: 5px;
            font-size: 1.15rem;
        }
        .timeline-company {
            font-size: 1rem;
            color: var(--secondary-text);
            font-weight: 500;
            margin-bottom: 12px;
        }

        /* Keahlian (Progress Bar) */
        .skill-category {
            font-weight: 600;
            color: var(--accent-color);
            margin-top: 20px;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        .skill-item { margin-bottom: 25px; }
        .skill-item .skill-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .skill-item .skill-info .skill-name {
            font-weight: 600;
            color: var(--heading-color-light);
        }
        .skill-item .skill-info .skill-level {
            font-weight: 500;
            color: var(--secondary-text);
        }
        .progress {
            height: 12px;
            border-radius: 6px;
            background-color: var(--dark-bg-3);
        }
        .progress-bar {
            background-color: var(--primary-color);
            border-radius: 6px;
            transition: width 1.5s ease-in-out; 
        }

        /* Footer */
        footer {
            background-color: var(--dark-bg-2);
            box-shadow: 0 -5px 15px rgba(0,0,0,0.3);
            /* Footer juga harus full-width */
            margin-top: 50px;
        }
        footer p {
            color: var(--secondary-text);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
                min-height: auto;
                padding: 4rem 0;
            }
            .hero-content {
                padding: 0 20px;
                margin-bottom: 3rem;
                text-align: center; /* Teks jadi center di mobile */
            }
            .hero-greeting { 
                border-bottom: none; /* Hapus border di mobile */
                display: block;
            } 
            .hero-section h1 { font-size: 3rem; }
            .hero-section .lead { font-size: 1.2rem; }
            .hero-image-wrapper { width: 280px; height: 280px; }
            .hero-section .contact-links {
                text-align: center;
                margin-top: 30px;
            }
            .hero-section .contact-links .btn {
                width: 90%;
                margin: 0 auto 15px auto;
                display: block;
            }

            .navbar-brand { font-size: 1rem; }
            .navbar-profile-photo { height: 35px; width: 35px; }
            .section-title { font-size: 1.8rem; }
        }
        @media (max-width: 768px) {
            .navbar-nav { margin-top: 10px; }
            .navbar-brand {
                font-size: 0;
                width: 40px;
                justify-content: center;
            }
            .hero-section h1 { font-size: 2.5rem; }
            .hero-section .lead { font-size: 1rem; }
            .hero-image-wrapper { width: 250px; height: 250px; }
            .decorative-circle { display: none; }
        }

        /* Animasi */
        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ============================== */
        /* CSS UNTUK TOMBOL THEME TOGGLE */
        /* ============================== */
        .theme-switcher {
            font-size: 1.3rem;
            color: var(--secondary-text); /* Gunakan var warna Anda */
            cursor: pointer;
            transition: color 0.3s ease;
            width: 40px; /* Samakan lebar dgn logo kiri */
            text-align: right;
        }
        .theme-switcher:hover {
            color: var(--heading-color-light); /* Warna hover */
        }
        /* Sembunyikan matahari di mode gelap (default) */
        .theme-switcher .bi-sun-fill {
            display: none;
        }
        .theme-switcher .bi-moon-fill {
            display: inline-block;
        }

        /* ============================== */
        /* STYLE UNTUK LIGHT MODE       */
        /* ============================== */

        /* Saat body memiliki class .light-mode... */
        body.light-mode {
            /* Ganti variabel warna utama */
            --dark-bg-1: #f4f7f6; /* Latar body jadi abu-abu muda */
            --dark-bg-2: #ffffff; /* Latar card jadi putih */
            --dark-bg-3: #f0f0f0; /* Latar progress bar */
            --text-color-light: #333333; /* Teks utama jadi hitam */
            --heading-color-light: #1a1a1a; /* Judul jadi hitam pekat */
            --secondary-text: #555555; /* Teks sekunder jadi abu-abu */
            --border-color-dark: #e0e0e0; /* Border jadi abu-abu muda */
        }

        /* Ganti ikon tombol toggle */
        body.light-mode .theme-switcher .bi-sun-fill {
            display: inline-block;
        }
        body.light-mode .theme-switcher .bi-moon-fill {
            display: none;
        }
        body.light-mode .theme-switcher:hover {
            color: var(--primary-color); /* Warna hover jadi biru */
        }
        body.light-mode .theme-switcher {
            color: var(--secondary-text);
        }

        /* Penyesuaian lain untuk mode terang */
        body.light-mode .navbar {
            background-color: var(--dark-bg-2); /* Navbar jadi putih */
        }
        body.light-mode .navbar-nav .nav-link {
            color: var(--secondary-text); /* Teks link jadi abu-abu */
        }
        body.light-mode .navbar-nav .nav-link:hover {
            color: var(--primary-color); /* Hover jadi biru */
        }
        body.light-mode .navbar-nav .nav-link.active::after {
            background-color: var(--primary-color);
        }
        body.light-mode .navbar-brand {
            color: var(--heading-color-light); /* Nama di navbar jadi hitam */
        }

        /* Hero */
        body.light-mode .hero-section {
            background-color: var(--dark-bg-2); /* Hero jadi putih */
        }

        /* Timeline */
        body.light-mode .timeline-item {
            background: var(--dark-bg-2); /* Timeline item jadi putih */
        }
        body.light-mode .timeline-item::before {
            border-color: var(--dark-bg-1); /* Border dot jadi warna body */
        }
        
        /* Accordion */
        body.light-mode .accordion-item {
            background-color: var(--dark-bg-2);
            border-color: var(--border-color-dark);
        }
        body.light-mode .accordion-button {
            background-color: var(--dark-bg-2);
            color: var(--heading-color-light);
        }
        body.light-mode .accordion-button:not(.collapsed) {
            color: #ffffff; /* Teks tombol aktif (di atas bg biru) */
        }
        body.light-mode .accordion-button::after {
            /* Ganti ikon panah accordion jadi hitam (default) */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        /* Skills */
        body.light-mode .progress {
            background-color: var(--dark-bg-3); /* Bg progress bar jadi abu */
        }

        /* Footer */
        body.light-mode footer {
            background-color: var(--dark-bg-2);
        }

        /* ============================== */
/* CSS UNTUK KARTU PORTOFOLIO     */
/* ============================== */
.portfolio-card {
    background-color: var(--dark-bg-2);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    margin-bottom: 30px;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}
.portfolio-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}
.portfolio-card-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
}
.portfolio-card-body {
    padding: 20px 25px;
}
.portfolio-card-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 1.1rem;
    color: var(--heading-color-light);
    margin-bottom: 5px;
}
.portfolio-card-issuer {
    font-size: 0.9rem;
    color: var(--primary-color);
    font-weight: 500;
    margin-bottom: 0;
}

/* CSS untuk subtitle (deskripsi) section */
.section-subtitle {
    color: var(--secondary-text); 
    text-align: center; 
    max-width: 600px; 
    margin: 0 auto 50px auto;
}
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#cv-navbar" data-bs-offset="100">
    <nav id="cv-navbar" class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        
        <a class="navbar-brand" href="#beranda">
            <img src="<?= base_url('img/foto saya4.jpg') ?>" alt="Foto Profil" class="navbar-profile-photo">
            <span class="d-none d-sm-inline ms-2"><?= $personal['full_name'] ?? 'Nama Saya' ?></span>
        </a>

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" href="#beranda">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pendidikan">Pendidikan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pengalaman">Pengalaman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#keahlian">Keahlian</a>
            </li>
            <li><a class="nav-link" href="#portofolio">Portofolio</a>
            </li> 
        </ul>
        
        <div class="theme-switcher" id="theme-toggle">
            <i class="bi bi-sun-fill"></i>
            <i class="bi bi-moon-fill"></i>
        </div>

    </div>
</nav>

    <section id="beranda" class="hero-section">
    
        <div class="decorative-circle circle-1"></div>
        <div class="decorative-circle circle-2"></div>
        <div class="decorative-circle circle-3"></div>

        <div class="container-fluid px-3 px-lg-5 d-flex flex-column flex-lg-row align-items-lg-center">
            
            <div class="hero-content text-lg-start text-center">
                <p class="hero-greeting">Halo, saya</p>
                <h1><?= $personal['full_name'] ?? 'Mochammad Bimo Ibrahim' ?></h1>
                
                <p class="lead"><?= $personal['job_title'] ?? 'Mahasiswa TI | dengan keahlian dalam pengelolaan database SQL dan pemahaman dasar keamanan siber. Terbiasa bekerja dengan MySQL dan mempelajari praktik keamanan jaringan untuk menjaga integritas serta keamanan data.' ?></p>
                
                <div class="contact-links">
                    <a href="mailto:<?= $personal['bimoibr159@gmail.com'] ?? '' ?>" class="btn btn-primary"><i class="bi bi-envelope"></i> Email</a>
                    <a href="tel:<?= $personal['085864333518'] ?? '' ?>" class="btn btn-primary"><i class="bi bi-phone"></i> <?= $personal['phone'] ?? '08586433518' ?></a>
                    <a href="https://github.com/bimoibra14" target="_blank" class="btn btn-primary"><i class="bi bi-github"></i> GitHub</a>
                </div>
            </div>

            <div class="hero-image-container">
                <div class="hero-image-wrapper">
                    <img src="<?= base_url('img/foto saya4.jpg') ?>" alt="Foto Profil" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <div class="container section-container">

        <section id="pendidikan" class="py-5 section">
            <h2 class="section-title">Pendidikan</h2>
            
            <div class="accordion" id="accordionPendidikan">
                <?php if (!empty($education)): ?>
                    <?php foreach ($education as $index => $edu): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?= $index ?>">
                                <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $index ?>" aria-expanded="<?= $index == 0 ? 'true' : 'false' ?>" aria-controls="collapse-<?= $index ?>">
                                    <?= $edu['school_name'] ?? 'Nama Sekolah' ?>
                                </button>
                            </h2>
                            <div id="collapse-<?= $index ?>" class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>" aria-labelledby="heading-<?= $index ?>" data-bs-parent="#accordionPendidikan">
                                <div class="accordion-body">
                                    <strong><?= $edu['degree'] ?? 'Gelar' ?></strong><br>
                                    Tahun: <?= $edu['start_year'] ?? '' ?> - <?= $edu['end_year'] ?? '' ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Data pendidikan belum ditambahkan.</p>
                <?php endif; ?>
            </div>
        </section>

        <section id="pengalaman" class="py-5 section">
            <h2 class="section-title">Pengalaman</h2>

            <ul class="timeline">
                <?php if (!empty($experience)): ?>
                    <?php foreach ($experience as $exp): ?>
                        <li class="timeline-item">
                            <div class="timeline-date"><?= $exp['start_date'] ?? 'Tgl Mulai' ?> - <?= $exp['end_date'] ?? 'Tgl Selesai' ?></div>
                            <h5 class="timeline-title"><?= $exp['role'] ?? 'Posisi Anda' ?></h5>
                            <h6 class="timeline-company"><?= $exp['company_name'] ?? 'Nama Perusahaan' ?></h6>
                            <p><?= $exp['description'] ?? 'Deskripsi tugas Anda.' ?></p>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Data pengalaman belum ditambahkan.</p>
                <?php endif; ?>
            </ul>
        </section>

        <section id="keahlian" class="py-5 section">
            <h2 class="section-title">Keahlian</h2>
            
            <div class="p-4 p-md-5 rounded-3 shadow-sm" style="background-color: var(--dark-bg-2);">
                <?php if (!empty($skills_grouped)): ?>
                    <?php foreach ($skills_grouped as $category => $skills): ?>
                        <h5 class="skill-category text-center mb-4"><?= htmlspecialchars($category) ?></h5>
                        <div class="row">
                            <?php 
                            $half = ceil(count($skills) / 2);
                            $skills_col1 = array_slice($skills, 0, $half);
                            $skills_col2 = array_slice($skills, $half);
                            ?>

                            <div class="col-md-6">
                                <?php foreach ($skills_col1 as $skill): ?>
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span class="skill-name"><?= htmlspecialchars($skill['skill_name']) ?></span>
                                            <span class="skill-level"><?= htmlspecialchars($skill['level_text']) ?></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $skill['percentage'] ?>%;" aria-valuenow="<?= $skill['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-md-6">
                                <?php foreach ($skills_col2 as $skill): ?>
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span class="skill-name"><?= htmlspecialchars($skill['skill_name']) ?></span>
                                            <span class="skill-level"><?= htmlspecialchars($skill['level_text']) ?></span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: <?= $skill['percentage'] ?>%;" aria-valuenow="<?= $skill['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <hr class="my-4" style="border-color: var(--border-color-dark);"> 
                    <?php endforeach; ?>
                    <style> hr:last-child { display: none; } </style>
                <?php else: ?>
                    <p>Data keahlian belum ditambahkan.</p>
                <?php endif; ?>
            </div>
        </section>

        <section id="portofolio" class="py-5 section">
    <h2 class="section-title">Portofolio</h2>
    <p class="section-subtitle">
        Beberapa pencapaian dan sertifikasi yang telah saya peroleh.
    </p>
    
    <div class="row">
        <?php if (!empty($certificates)): ?>
            <?php foreach ($certificates as $index => $cert): ?>
                
                <div class="col-lg-4 col-md-6">
                    <div class="portfolio-card" style="animation-delay: <?= $index * 100 ?>ms">
                        <a href="<?= base_url('img/sertifikat/' . $cert['image_filename']) ?>" target="_blank" title="Lihat ukuran penuh">
                            <img src="<?= base_url('img/sertifikat/' . $cert['image_filename']) ?>" class="portfolio-card-img" alt="<?= htmlspecialchars($cert['title']) ?>">
                        </a>
                        <div class="portfolio-card-body">
                            <h5 class="portfolio-card-title"><?= htmlspecialchars($cert['title']) ?></h5>
                            <p class="portfolio-card-issuer"><?= htmlspecialchars($cert['issuer']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        <?php else: ?>
            <p style="color: var(--secondary-text); text-align: center;">Belum ada portofolio untuk ditampilkan.</p>
        <?php endif; ?>
    </div> </section>

    </div> <footer class="text-center p-4 mt-5">
        <p class="mb-0">&copy; <?= date('Y') ?> <?= $personal['full_name'] ?? '' ?></p>
    </footer>

    </div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // (Script Anda untuk scrollspy... biarkan di sini)
        const sections = document.querySelectorAll('.right-panel section');
        // ... (sisa kode scrollspy)
    </script>
    
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const body = document.body;

        // Fungsi untuk menerapkan tema
        function setTheme(theme) {
            if (theme === 'light') {
                body.classList.add('light-mode');
                localStorage.setItem('theme', 'light');
            } else {
                body.classList.remove('light-mode');
                localStorage.setItem('theme', 'dark');
            }
        }

        // 1. Periksa tema yang tersimpan
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme) {
            setTheme(currentTheme); 
        }

        // 2. Tambahkan event listener untuk tombol klik
        // Periksa dulu apakah tombolnya ada sebelum menambahkan listener
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', () => {
                if (body.classList.contains('light-mode')) {
                    setTheme('dark');
                } else {
                    setTheme('light');
                }
            });
        }
    </script>
</body>
</html>