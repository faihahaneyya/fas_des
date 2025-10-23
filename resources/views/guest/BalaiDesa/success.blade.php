<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Berhasil</title>

    <style>
        /* 🌱 Latar belakang pastel lembut */
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #d6f5e3, #c1f0dc, #aaf0d1);
            color: #2e4730;
            text-align: center;
            margin-top: 100px;
            animation: fadeIn 1.2s ease-in-out;
        }

        /* ✨ Judul muncul dengan efek lembut */
        h1 {
            font-size: 2.5rem;
            color: #2e7d32;
            text-shadow: 0 2px 5px rgba(0,0,0,0.1);
            animation: bounce 1.5s ease;
        }

        /* 🌼 Paragraf fade-up */
        p {
            font-size: 1.2rem;
            opacity: 0;
            animation: fadeUp 1.5s ease forwards;
            animation-delay: 0.8s;
            color: #33691e;
        }

        /* 💚 Tombol hijau pastel */
        a {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #ffffff;
            background-color: #81c784;
            padding: 12px 28px;
            border-radius: 30px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(129, 199, 132, 0.5);
            opacity: 0;
            animation: fadeUp 1.2s ease forwards;
            animation-delay: 1.2s;
            transition: all 0.3s ease;
        }

        /* 🌸 Hover effect lucu */
        a:hover {
            transform: scale(1.08);
            background-color: #66bb6a;
            box-shadow: 0 0 18px rgba(102, 187, 106, 0.7);
        }

        /* ✨ Animasi lembut */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-25px);}
            60% {transform: translateY(-10px);}
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Peminjaman Berhasil!</h1>
    <p>Terima kasih, {{ session('nama') }}. Data peminjaman Anda telah disimpan.</p>
    <a href="{{ route('peminjaman.create') }}">Kembali ke Form</a>
</body>
</html>
