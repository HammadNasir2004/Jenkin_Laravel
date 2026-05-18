<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - Hammad Nasir FA22-BSE-097</title>
    <style>
        :root {
            --bg: #eef4ff;
            --card: #ffffff;
            --text: #10223e;
            --muted: #5b6c87;
            --primary: #0f62fe;
            --primary-dark: #0b4ccd;
            --line: #d8e2f2;
            --shadow: 0 20px 45px rgba(16, 34, 62, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 10% 10%, #dbeafe 0%, transparent 35%),
                radial-gradient(circle at 90% 20%, #c7d2fe 0%, transparent 35%),
                var(--bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .hero {
            text-align: center;
            max-width: 600px;
            margin-bottom: 40px;
        }

        .hero-title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #0b2a5a;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 20px;
            color: var(--muted);
            margin-bottom: 32px;
            line-height: 1.5;
        }

        .auth-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            border: 0;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            padding: 16px 32px;
            cursor: pointer;
            transition: transform .16s ease, background .2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            min-width: 140px;
        }

        .btn-primary {
            background: linear-gradient(180deg, #1c6dff, #0f62fe);
            color: #fff;
        }

        .btn-primary:hover {
            background: linear-gradient(180deg, #1559dd, #0b4ccd);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #ffffff;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: #fff;
            transform: translateY(-1px);
        }

        .student-info {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 12px 16px;
            box-shadow: var(--shadow);
            font-size: 14px;
            color: var(--muted);
        }

        @media (max-width: 600px) {
            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .auth-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 280px;
            }

            .student-info {
                position: static;
                margin-bottom: 20px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="student-info">
        Hammad Nasir - FA22-BSE-097
    </div>

    <div class="hero">
        <h1 class="hero-title">Welcome to Our Platform</h1>
        <p class="hero-subtitle">
            Join us today and manage your data with our powerful CRUD system.
            Create an account or login to access your dashboard.
        </p>

        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('signup') }}" class="btn btn-secondary">Sign Up</a>
        </div>
    </div>
</body>
</html>
