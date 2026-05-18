<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <style>
        :root {
            --bg: #eef4ff;
            --card: #ffffff;
            --text: #10223e;
            --muted: #5b6c87;
            --primary: #0f62fe;
            --primary-dark: #0b4ccd;
            --line: #d8e2f2;
            --error-bg: #ffeaea;
            --error-text: #9b1c1c;
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
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }

        .auth-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            color: #0b2a5a;
        }

        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input {
            width: 100%;
            border: 1px solid #c9d6ea;
            border-radius: 11px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            background: #fbfdff;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(15, 98, 254, 0.14);
        }

        .btn {
            width: 100%;
            border: 0;
            border-radius: 12px;
            background: linear-gradient(180deg, #1c6dff, #0f62fe);
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            padding: 14px 18px;
            cursor: pointer;
            transition: transform .16s ease, background .2s;
            margin-bottom: 20px;
        }

        .btn:hover {
            background: linear-gradient(180deg, #1559dd, #0b4ccd);
            transform: translateY(-1px);
        }

        .errors {
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 20px;
            font-size: 14px;
            background: var(--error-bg);
            color: var(--error-text);
            border: 1px solid #f8b5b5;
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .auth-links {
            text-align: center;
        }

        .auth-links a {
            color: var(--primary);
            text-decoration: none;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h1 class="auth-title">Sign Up</h1>

        @if ($errors->any())
            <div class="errors">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('signup') }}">
            @csrf

            <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Your full name" required autofocus>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="your@email.com" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Create a password" required>
            </div>

            <div class="field">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password" required>
            </div>

            <button class="btn" type="submit">Sign Up</button>
        </form>

        <div class="auth-links">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</body>
</html>