    <style>
        /* start css */
        * {
            margin: 0; padding: 0; box-sizing: border-box;
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

        /* HEADER */
        .header {
            background: linear-gradient(135deg, rgba(168, 213, 168, 0.95), rgba(139, 195, 139, 0.95));
            padding: 15px 0;
            box-shadow: 0 2px 15px rgba(139, 195, 139, 0.2);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #2d5015;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 25px;
        }

        .nav-menu a {
            color: #2d5015;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
            position: relative;
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
            gap: 12px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
            color: #2d5015;
        }

        .user-info span:first-child {
            font-size: 18px;
        }

        .btn-logout {
            background: white;
            color: #7ab87a;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #d4e8d4;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #f8fcf8;
            box-shadow: 0 5px 15px rgba(139, 195, 139, 0.3);
        }

        /* HERO */
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

        /* STATISTIK */
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

        .stat-icon { font-size: 40px; margin-bottom: 10px; }
        .stat-number { font-size: 32px; font-weight: 700; color: #7ab87a; }
        .stat-label { color: #7a9c7a; }

        /* KONTEN */
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

        /* FOOTER */
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

        .footer-section h3 { margin-bottom: 15px; font-size: 18px; }
        .footer-section a {
            color: #4a6b4a;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            transition: 0.3s;
        }

        .footer-section a:hover { color: #2d5015; }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(45, 80, 21, 0.1);
            color: #4a6b4a;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .nav-container { flex-direction: column; gap: 10px; }
            .hero h1 { font-size: 28px; }
        }

        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        /* end css */
    </style>
