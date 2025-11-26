<!-- Partial View: Peminjaman Berhasil Start -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Berhasil</title>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #d6f5e3, #c1f0dc, #aaf0d1);
            color: #2e4730;
            text-align: center;
            margin-top: 100px;
            animation: fadeIn 1.2s ease-in-out;
        }

        h1 {
            font-size: 2.5rem;
            color: #2e7d32;
            text-shadow: 0 2px 5px rgba(0,0,0,0.1);
            animation: bounce 1.5s ease;
        }

        p {
            font-size: 1.2rem;
            opacity: 0;
            animation: fadeUp 1.5s ease forwards;
            animation-delay: 0.8s;
            color: #33691e;
        }

        /* Grup tombol biar sejajar */
        .btn-group {
            margin-top: 35px;
            animation: fadeUp 1.2s ease forwards;
            animation-delay: 1.2s;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Tombol */
        .btn-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #ffffff;
            padding: 14px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            margin: 0 5px;
            transition: all 0.4s ease;
            min-width: 200px;
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
        }

        /* Efek hover yang smooth */
        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-custom:hover::before {
            left: 100%;
        }

        /* Tombol Form */
        .btn-form {
            background: linear-gradient(135deg, #81c784, #66bb6a);
            border: 2px solid #4caf50;
        }

        .btn-form:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 25px rgba(102, 187, 106, 0.6);
            background: linear-gradient(135deg, #66bb6a, #4caf50);
        }

        /* Tombol Dashboard (warna lebih gelap dan menarik) */
        .btn-dashboard {
            background: linear-gradient(135deg, #5d9cec, #4a89dc);
            border: 2px solid #3b7ddd;
        }

        .btn-dashboard:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 25px rgba(77, 139, 245, 0.6);
            background: linear-gradient(135deg, #4a89dc, #3b7ddd);
        }

        /* Efek klik */
        .btn-custom:active {
            transform: translateY(1px) scale(0.98);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* Icon untuk tombol (opsional) */
        .btn-custom i {
            margin-right: 8px;
            font-size: 1.2rem;
        }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-25px);}
            60% {transform: translateY(-10px);}
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .btn-group {
                flex-direction: column;
                align-items: center;
            }

            .btn-custom {
                min-width: 250px;
                margin: 8px 0;
            }
        }
    </style>

    <!-- Font Awesome untuk icon (opsional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Konten Pemberitahuan Start -->
    <h1>Peminjaman Berhasil!</h1>
    <p>Terima kasih, {{ session('nama') }}. Data peminjaman Anda telah disimpan.</p>

    <!-- Tombol Aksi Start -->
    <div class="btn-group">
        <a href="{{ route('BalaiDesa.form-peminjaman') }}" class="btn-custom btn-form">
            <i class="fas fa-arrow-left"></i> Kembali ke Form
        </a>

       <a href="{{ route('dashboard') }}" class="btn-custom btn-dashboard">
    <i class="fas fa-tachometer-alt"></i> Kembali ke Dashboard
</a>
    </div>
    <!-- Tombol Aksi End -->
    <!-- Konten Pemberitahuan End -->

</body>
</html>
<!-- Partial View: Peminjaman Berhasil End -->
