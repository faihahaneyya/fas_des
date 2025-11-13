<style>
    /* start css */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(rgba(240, 247, 240, 0.9), rgba(232, 244, 232, 0.9)),
            url('https://images.unsplash.com/photo-1560493676-04071c5f467b?auto=format&fit=crop&w=2070&q=80');
        background-size: cover;
        background-attachment: fixed;
        color: #2d5015;
        line-height: 1.6;
        animation: fadeIn 1s ease-out forwards;
    }
/* ================= HEADER / NAVBAR ================= */
.header {
    background: linear-gradient(135deg, rgba(168, 213, 168, 0.95), rgba(139, 195, 139, 0.95));
    box-shadow: 0 3px 15px rgba(139, 195, 139, 0.25);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px 40px; /* ✅ Lebih tinggi biar sama kayak kontak/tentang */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    font-size: 26px; /* ✅ Lebih besar dan bold */
    font-weight: 700;
    color: #2d5015;
    letter-spacing: 0.5px;
}

.nav-menu {
    display: flex;
    list-style: none;
    gap: 40px; /* ✅ Spasi antar menu lebih lebar */
    align-items: center;
}

.nav-menu a {
    color: #2d5015;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
    position: relative;
    font-size: 18px; /* ✅ Ukuran teks disamakan */
    padding: 8px 0;
}

.nav-menu a::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 0;
    height: 2px;
    background: #2d5015;
    transition: width 0.3s ease;
}

.nav-menu a:hover::after {
    width: 100%;
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 25px;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #2d5015;
    font-weight: 600;
    font-size: 18px; /* ✅ Sama tinggi dengan menu */
}

.user-info span:first-child {
    font-size: 22px;
}

.btn-logout {
    background: white;
    color: #7ab87a;
    padding: 10px 24px; /* ✅ Sedikit lebih tinggi */
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    border: 2px solid #d4e8d4;
    transition: 0.3s;
    font-size: 16px;
}

.btn-logout:hover {
    background: #f8fcf8;
    box-shadow: 0 6px 18px rgba(139, 195, 139, 0.3);
    transform: translateY(-2px);
}

    /* ================= HERO SECTION ================= */
    .hero {
        background: linear-gradient(rgba(168, 213, 168, 0.85), rgba(94, 142, 94, 0.85));
        color: #2d5015;
        text-align: center;
        padding: 100px 20px;
    }

    .hero h1 {
        font-size: 40px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .hero p {
        font-size: 18px;
        margin-bottom: 25px;
    }

    .btn-explore {
        background: white;
        color: #7ab87a;
        padding: 15px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        border: 2px solid #d4e8d4;
        transition: 0.3s;
    }

    .btn-explore:hover {
        background: #f8fcf8;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(139, 195, 139, 0.2);
    }

    /* ================= STATISTIK ================= */
    .dashboard-stats {
        max-width: 1200px;
        margin: -50px auto 40px;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .stat-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        text-align: center;
        border: 2px solid #d4e8d4;
        transition: 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(139, 195, 139, 0.15);
    }

    .stat-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: #7ab87a;
    }

    .stat-label {
        color: #7a9c7a;
    }

    /* ================= MAIN CONTENT ================= */
    .main-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 20px;
    }

    .section-title {
        font-size: 26px;
        font-weight: 700;
        color: #2d5015;
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-pinjam {
        background: linear-gradient(135deg, #8bc38b, #7ab87a);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.3s;
        width: 100%;
    }

    .btn-pinjam:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(139, 195, 139, 0.3);
    }

    .ruangan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .ruangan-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        border: 2px solid #d4e8d4;
        box-shadow: 0 5px 15px rgba(139, 195, 139, 0.1);
        transition: 0.3s;
    }

    .ruangan-card:hover {
        transform: translateY(-5px);
    }

    .ruangan-image {
        height: 180px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 48px;
        background: linear-gradient(135deg, #a8d5a8, #8bc38b);
    }

    .ruangan-content {
        padding: 20px;
        text-align: center;
    }

    .ruangan-title {
        font-size: 20px;
        font-weight: 600;
        color: #2d5015;
        margin-bottom: 8px;
    }

    .ruangan-info {
        color: #7a9c7a;
        margin-bottom: 15px;
        font-size: 14px;
    }

    /* ================= FOOTER ================= */
    .footer {
        background: linear-gradient(135deg, rgba(139, 195, 139, 0.95), rgba(122, 184, 122, 0.95));
        color: #2d5015;
        padding: 40px 0;
        margin-top: 50px;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        padding: 0 20px;
    }

    .footer-section h3 {
        margin-bottom: 15px;
        font-size: 18px;
    }

    .footer-section a {
        color: #4a6b4a;
        text-decoration: none;
        display: block;
        margin-bottom: 8px;
        transition: 0.3s;
    }

    .footer-section a:hover {
        color: #2d5015;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid rgba(45, 80, 21, 0.1);
        color: #4a6b4a;
    }

    /* ================= SECTION TENTANG / KONTEN ================= */
    section {
        text-align: center;
        padding: 70px 20px 60px;
        margin-top: -20px;
        animation: fadeInUp 1.2s ease-out both;
    }

    h2 {
        font-size: 42px;
        font-weight: 700;
        color: #2d5015;
        margin-bottom: 25px;
    }

    p {
        max-width: 850px;
        margin: 0 auto 30px;
        font-size: 17px;
        color: #4a6b4a;
        line-height: 1.7;
    }

    .overview {
        background-color: white;
        border: 2px solid #d4e8d4;
        border-radius: 15px;
        padding: 40px;
        width: 80%;
        margin: 25px auto;
        box-shadow: 0 5px 15px rgba(139, 195, 139, 0.1);
        transition: all 0.3s ease;
    }

    .overview:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(139, 195, 139, 0.15);
    }

    .overview h3 {
        font-size: 22px;
        color: #2d5015;
        margin-bottom: 15px;
    }
 .kontak {
        text-align: center;
        padding: 100px 20px;
        max-width: 1000px;
        margin: auto;
    }

    .kontak h1 {
        font-size: 42px;
        color: #2d5015;
        margin-bottom: 20px;
    }

    .kontak p {
        font-size: 18px;
        color: #4a6b4a;
        margin-bottom: 50px;
    }

    .contact-cards {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 40px;
    }

    .card {
        background: white;
        border: 2px solid #d4e8d4;
        border-radius: 15px;
        padding: 30px;
        width: 250px;
        box-shadow: 0 5px 15px rgba(139, 195, 139, 0.1);
        transition: 0.3s;
        animation: fadeUp 0.8s ease-in-out;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(139, 195, 139, 0.15);
    }

    .card h3 {
        color: #2d5015;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .card p {
        color: #4a6b4a;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .card a {
        background: linear-gradient(135deg, #8bc38b, #7ab87a);
        color: white;
        text-decoration: none;
        border-radius: 20px;
        padding: 8px 14px;
        font-size: 13px;
        transition: 0.3s;
        display: inline-block;
    }

    .card a:hover {
        background: linear-gradient(135deg, #7ab87a, #8bc38b);
        transform: scale(1.05);
    }

 /* Floating WhatsApp Button */
.whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 25px;
    right: 25px;
    background-color: #25d366;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    background-color: #1ebe5d;
}

.whatsapp-icon {
    width: 35px;
    height: 35px;
}

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .nav-container {
            flex-direction: column;
            gap: 10px;
        }

        .nav-menu {
            flex-wrap: wrap;
            justify-content: center;
        }

        .hero h1 {
            font-size: 28px;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
    /* end css */
</style>
