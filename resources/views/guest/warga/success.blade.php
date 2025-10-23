<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Peminjaman</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .success-card {
            background: #ffffff;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 480px;
            width: 90%;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .success-icon {
            font-size: 70px;
            color: #2ecc71;
            margin-bottom: 20px;
            animation: pop 0.5s ease;
        }

        @keyframes pop {
            0% { transform: scale(0); opacity: 0; }
            80% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }

        h1 {
            color: #1e88e5;
            font-weight: 600;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            font-size: 15px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        a.btn-home {
            display: inline-block;
            background-color: #1e88e5;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.btn-home:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
        }

        .footer-note {
            margin-top: 20px;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="success-card">
        <div class="success-icon">✅</div>
        <h1>Pengajuan Berhasil!</h1>
        <p>
            Terima kasih <strong>{{ session('nama') ?? 'Warga' }}</strong>.<br>
            Form peminjaman Balai Desa kamu telah berhasil dikirim.<br>
            Tim kami akan segera meninjau permohonan kamu dan memberikan konfirmasi melalui kontak terdaftar.
        </p>
        <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>
        <div class="footer-note">
            © {{ date('Y') }} Balai Desa | Sistem Peminjaman Fasilitas
        </div>
    </div>
</body>
</html>
