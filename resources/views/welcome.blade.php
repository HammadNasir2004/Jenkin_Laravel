<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <style>
        :root {
            --bg: #eef4ff;
            --card: #ffffff;
            --text: #10223e;
            --muted: #5b6c87;
            --primary: #0f62fe;
            --primary-dark: #0b4ccd;
            --line: #d8e2f2;
            --success-bg: #e7f8ee;
            --success-text: #146c3c;
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
            padding: 32px 16px;
        }

        .layout {
            max-width: 1080px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 22px;
        }

        .page-title {
            max-width: 1080px;
            margin: 0 auto 14px;
            text-align: center;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 0.4px;
            color: #0b2a5a;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-head {
            padding: 22px 24px;
            border-bottom: 1px solid var(--line);
            background: linear-gradient(100deg, #eff6ff, #f8faff);
        }

        .card-head h1,
        .card-head h2 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 0.3px;
        }

        .card-head p {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .card-body {
            padding: 24px;
        }

        .field {
            margin-bottom: 14px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #c9d6ea;
            border-radius: 11px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            background: #fbfdff;
        }

        input:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(15, 98, 254, 0.14);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .btn {
            border: 0;
            border-radius: 12px;
            background: linear-gradient(180deg, #1c6dff, #0f62fe);
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 18px;
            cursor: pointer;
            transition: transform .16s ease, background .2s;
        }

        .btn:hover {
            background: linear-gradient(180deg, #1559dd, #0b4ccd);
            transform: translateY(-1px);
        }

        .alert,
        .errors {
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 14px;
            font-size: 14px;
        }

        .alert {
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #b7ebc9;
        }

        .errors {
            background: var(--error-bg);
            color: var(--error-text);
            border: 1px solid #f8b5b5;
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .records {
            display: grid;
            gap: 12px;
        }

        .record {
            border: 1px solid var(--line);
            border-left: 5px solid var(--primary);
            background: #fbfdff;
            border-radius: 13px;
            padding: 14px;
        }

        .record-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            align-items: center;
            margin-bottom: 8px;
        }

        .record-name {
            margin: 0;
            font-size: 17px;
        }

        .record-time {
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        .record p {
            margin: 6px 0;
            font-size: 14px;
            color: #243754;
        }

        .empty {
            border: 1px dashed #b7c7de;
            border-radius: 12px;
            padding: 18px;
            color: var(--muted);
            background: #f8fbff;
            text-align: center;
        }

        @media (min-width: 900px) {
            .layout {
                grid-template-columns: 1fr 1.2fr;
            }
        }
    </style>
</head>
<body>
    <h1 class="page-title">Hammad Nasir FA22-BSE-097</h1>
    <div class="layout">
        <section class="card">
            <div class="card-head">
                <h1>Contact Form</h1>
                <p>Yahan data fill karein. Submit ke baad data DB mein save hoga.</p>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="errors">
                        <strong>Validation error:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('/') }}">
                    @csrf

                    <div class="field">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Apna naam likhein" required>
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="example@email.com" required>
                    </div>

                    <div class="field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Apna message likhein">{{ old('message') }}</textarea>
                    </div>

                    <button class="btn" type="submit">Save In Database</button>
                </form>
            </div>
        </section>

        <section class="card">
            <div class="card-head">
                <h2>Saved Records (DB Fetch)</h2>
                <p>Yeh data direct database se fetch ho kar aa raha hai.</p>
            </div>
            <div class="card-body">
                @if ($messages->isEmpty())
                    <div class="empty">Abhi tak koi data save nahi hua.</div>
                @else
                    <div class="records">
                        @foreach ($messages as $item)
                            <article class="record">
                                <div class="record-top">
                                    <h3 class="record-name">{{ $item->name }}</h3>
                                    <span class="record-time">{{ $item->created_at?->format('d M Y, h:i A') }}</span>
                                </div>
                                <p><strong>Email:</strong> {{ $item->email }}</p>
                                <p><strong>Message:</strong> {{ $item->message ?: 'N/A' }}</p>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>
</body>
</html>
