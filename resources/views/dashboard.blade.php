<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <style>
        :root {
            --bg: #f8fafc;
            --sidebar-bg: #ffffff;
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
            --shadow: 0 4px 6px -1px rgba(16, 34, 62, 0.1);
            --sidebar-width: 280px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background: var(--bg);
            min-height: 100vh;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            border-right: 1px solid var(--line);
            padding: 24px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            margin-bottom: 32px;
        }

        .sidebar-title {
            font-size: 24px;
            font-weight: 700;
            color: #0b2a5a;
            margin-bottom: 8px;
        }

        .sidebar-subtitle {
            color: var(--muted);
            font-size: 14px;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: block;
            padding: 12px 16px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            transition: background-color .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #f1f5f9;
            color: var(--primary);
        }

        .nav-link.active {
            background: rgba(15, 98, 254, 0.1);
            color: var(--primary);
        }

        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 32px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #0b2a5a;
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-name {
            font-weight: 600;
        }

        .logout-btn {
            border: 0;
            border-radius: 8px;
            background: #dc2626;
            color: #fff;
            font-weight: 500;
            font-size: 14px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color .2s;
        }

        .logout-btn:hover {
            background: #b91c1c;
        }

        .content-area {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 24px;
        }

        .btn {
            border: 0;
            border-radius: 8px;
            background: linear-gradient(180deg, #1c6dff, #0f62fe);
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 16px;
            cursor: pointer;
            transition: transform .16s ease, background .2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background: linear-gradient(180deg, #1559dd, #0b4ccd);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .alert {
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 14px;
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #b7ebc9;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--muted);
        }

        .empty-state h3 {
            margin-bottom: 8px;
            color: var(--text);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: static;
                height: auto;
                border-right: none;
                border-bottom: 1px solid var(--line);
            }

            .main-content {
                margin-left: 0;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1 class="sidebar-title">Dashboard</h1>
                <p class="sidebar-subtitle">Manage your items</p>
            </div>

            <nav>
                <ul class="sidebar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Overview
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('items.index') }}" class="nav-link {{ request()->routeIs('items.*') ? 'active' : '' }}">
                            Items
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('items.create') }}" class="nav-link">
                            Add Item
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
               <h1>Hammad</h1>
                <h1 class="page-title">Welcome back, {{ auth()->user()->name }}!</h1>
                <div class="user-info">
                    <span class="user-name">{{ auth()->user()->email }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </header>

            <div class="content-area">
                @if (session('success'))
                    <div class="alert">{{ session('success') }}</div>
                @endif

                @yield('content')

                {{-- Dashboard stats (shown when dashboard route renders) --}}
                @if (request()->routeIs('dashboard'))
                    <div style="text-align: center; padding: 40px 20px;">
                        <h2 style="color: #0b2a5a; margin-bottom: 24px;">Dashboard Overview</h2>

                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px; margin-bottom: 32px;">
                            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 24px; border-radius: 12px; text-align: center;">
                                <h3 style="margin: 0 0 8px 0; font-size: 36px; font-weight: 700;">{{ $totalItems ?? 0 }}</h3>
                                <p style="margin: 0; font-size: 14px; opacity: 0.9;">Total Items</p>
                            </div>

                            <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 24px; border-radius: 12px; text-align: center;">
                                <h3 style="margin: 0 0 8px 0; font-size: 36px; font-weight: 700;">$ {{ number_format($totalValue ?? 0, 2) }}</h3>
                                <p style="margin: 0; font-size: 14px; opacity: 0.9;">Total Value</p>
                            </div>

                            <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 24px; border-radius: 12px; text-align: center;">
                                <h3 style="margin: 0 0 8px 0; font-size: 36px; font-weight: 700;">{{ $recentItems?->count() ?? 0 }}</h3>
                                <p style="margin: 0; font-size: 14px; opacity: 0.9;">Recent Items</p>
                            </div>
                        </div>

                        <div style="text-align: left; max-width: 800px; margin: 0 auto;">
                            <h3 style="color: #0b2a5a; margin-bottom: 16px;">Recent Items</h3>

                            @if(!empty($recentItems) && $recentItems->isNotEmpty())
                                <div style="display: grid; gap: 12px;">
                                    @foreach($recentItems as $item)
                                        <div style="background: #f8fafc; border: 1px solid #d8e2f2; border-radius: 8px; padding: 16px; display: flex; justify-content: space-between; align-items: center;">
                                            <div>
                                                <h4 style="margin: 0 0 4px 0; font-size: 16px; color: #0b2a5a;">{{ $item->name }}</h4>
                                                <p style="margin: 0; color: #6b7280; font-size: 14px;">$ {{ number_format($item->price, 2) }} | Created {{ $item->created_at?->diffForHumans() }}</p>
                                            </div>
                                            <a href="{{ route('items.show', $item) }}" style="background: #0f62fe; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px;">View</a>
                                        </div>
                                    @endforeach
                                </div>

                                <div style="text-align: center; margin-top: 24px;">
                                    <a href="{{ route('items.index') }}" class="btn">View All Items</a>
                                </div>
                            @else
                                <div style="text-align: center; padding: 40px; background: #f8fafc; border-radius: 8px; border: 2px dashed #d8e2f2;">
                                    <p style="margin: 0; color: #6b7280;">
                                        No items yet.
                                        <a href="{{ route('items.create') }}" style="color: #0f62fe; text-decoration: none;">Create your first item</a>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>


