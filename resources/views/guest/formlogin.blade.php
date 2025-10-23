<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Peminjaman Ruangan Desa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f7f0 0%, #e8f4e8 100%);
            color: #2d5015;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(122, 188, 122, 0.15);
            overflow: hidden;
            max-width: 420px;
            width: 100%;
            border: 1px solid #d4e8d4;
            animation: slideUp 0.8s ease-out;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(139, 195, 139, 0.1), transparent);
            transition: left 0.5s;
        }

        .login-container:hover::before {
            left: 100%;
        }

        .header {
            background: linear-gradient(135deg, #a8d5a8 0%, #8bc38b 100%);
            color: #2d5015;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            animation: float 6s linear infinite;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            animation: fadeInDown 0.8s ease-out;
        }

        .header p {
            font-size: 14px;
            opacity: 0.8;
            position: relative;
            z-index: 2;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .form-content {
            padding: 40px 30px;
            background: white;
        }

        .form-group {
            margin-bottom: 25px;
            animation: slideInRight 0.6s ease-out both;
        }

        .form-group:nth-child(1) {
            animation-delay: 0.3s;
        }

        .form-group:nth-child(2) {
            animation-delay: 0.5s;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a6b4a;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #d4e8d4;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8fcf8;
            color: #4a6b4a;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #8bc38b;
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 195, 139, 0.2);
            background: white;
            transform: translateY(-2px);
        }

        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #9bc29b;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #8bc38b 0%, #7ab87a 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out 0.7s both;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #7ab87a 0%, #8bc38b 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.3);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
            text-align: center;
            font-size: 14px;
            animation: bounceIn 0.6s ease-out;
        }

        .message.success {
            background: #f0f9f0;
            color: #7ab87a;
            border: 1px solid #c8e6c8;
        }

        .message.error {
            background: #fff5f5;
            color: #e57373;
            border: 1px solid #ffcdd2;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e8f4e8;
            color: #7a9c7a;
            font-size: 12px;
            animation: fadeIn 1s ease-out 0.9s both;
        }

        .garden-icon {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
            animation: bounce 2s ease-in-out infinite;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-20px, -20px) rotate(360deg); }
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media (max-width: 480px) {
            .form-content {
                padding: 30px 20px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <span class="garden-icon">🌿</span>
            <h1>Sistem Peminjaman Ruangan Desa</h1>
            <p>Kelola fasilitas desa dengan mudah dan efisien</p>
        </div>

        <div class="form-content">
            {{-- Pesan sukses atau error --}}
            @if(session('pesan'))
                <div class="message success">
                    {{ session('pesan') }}
                </div>
            @endif

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="message error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

           <form action="{{ route('auth.login') }}" method="POST">

                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                </div>

                <button type="submit" class="btn-login">
                    Masuk ke Sistem
                </button>
            </form>

            <div class="footer">
                &copy; 2024 Sistem Peminjaman Ruangan Desa
            </div>
        </div>
    </div>
</body>
</html>
