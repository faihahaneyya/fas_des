{{-- resources/views/guest/formregister.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .box {
        background: rgba(255, 255, 255, 0.95);
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(122, 188, 122, 0.15);
        width: 320px;
        max-width: 100%;
        border: 1px solid #d4e8d4;
        animation: slideUp 0.8s ease-out;
        position: relative;
    }

    .box h2 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 24px;
        font-weight: 700;
        color: #2d5015;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: 600;
        color: #4a6b4a;
        font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 14px 16px;
        margin-top: 5px;
        border-radius: 10px;
        border: 2px solid #d4e8d4;
        background: #f8fcf8;
        color: #4a6b4a;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #8bc38b;
        outline: none;
        box-shadow: 0 0 0 3px rgba(139, 195, 139, 0.2);
        background: white;
        transform: translateY(-2px);
    }

    ::placeholder {
        color: #9bc29b;
    }

    button {
        width: 100%;
        padding: 15px;
        margin-top: 20px;
        background: linear-gradient(135deg, #8bc38b 0%, #7ab87a 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    button:hover {
        background: linear-gradient(135deg, #7ab87a 0%, #8bc38b 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 195, 139, 0.3);
    }

    .error {
        color: #e57373;
        font-size: 0.9em;
        margin-top: 5px;
    }

    .success {
        color: #7ab87a;
        text-align: center;
        margin-bottom: 15px;
        font-weight: 500;
        font-size: 14px;
        animation: bounceIn 0.6s ease-out;
    }

    p {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    p a {
        color: #4a6b4a;
        font-weight: 600;
        text-decoration: none;
    }

    p a:hover {
        text-decoration: underline;
    }

    /* Animations */
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes bounceIn {
        0% { opacity: 0; transform: scale(0.3); }
        50% { opacity: 1; transform: scale(1.05); }
        70% { transform: scale(0.9); }
        100% { opacity: 1; transform: scale(1); }
    }
</style>

</head>
<body>
    <div class="box">
        <h2>Register</h2>

        {{-- Pesan sukses --}}
        @if(session('pesan'))
            <div class="success">{{ session('pesan') }}</div>
        @endif

        <form action="{{ route('auth.register') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <label>Password</label>
            <input type="password" name="password">
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation">

            <button type="submit">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>
</body>
</html>
