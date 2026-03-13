<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de contacts')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-page: #f1f5f9;
            --bg-card: #ffffff;
            --text: #0f172a;
            --text-muted: #64748b;
            --accent: #0d9488;
            --accent-hover: #0f766e;
            --border: #e2e8f0;
            --radius: 12px;
            --radius-lg: 16px;
            --shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
            --shadow-lg: 0 10px 40px -10px rgba(15, 23, 42, 0.12);
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            background: var(--bg-page);
            color: var(--text);
            min-height: 100vh;
            margin: 0;
            line-height: 1.6;
        }
        .nav {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
            padding: 1rem 0;
        }
        .nav-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .nav-brand {
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.02em;
        }
        .nav-brand:hover { color: var(--accent); }
        .main {
            max-width: 960px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-radius: var(--radius);
            padding: 0.875rem 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9375rem;
            font-weight: 500;
        }
        .card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            padding: 2rem;
            border: 1px solid var(--border);
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 0 1.5rem;
            letter-spacing: -0.02em;
            color: var(--text);
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 0.375rem;
        }
        .form-control {
            width: 100%;
            padding: 0.625rem 0.875rem;
            font-size: 0.9375rem;
            font-family: inherit;
            color: var(--text);
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control::placeholder { color: var(--text-muted); }
        .form-control:hover { border-color: #cbd5e1; }
        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.15);
        }
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        .form-error {
            font-size: 0.8125rem;
            color: #dc2626;
            margin-top: 0.25rem;
        }
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            font-size: 0.9375rem;
            font-weight: 600;
            font-family: inherit;
            color: #fff;
            background: var(--accent);
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }
        .btn-primary:hover {
            background: var(--accent-hover);
        }
        .btn-primary:active { transform: scale(0.98); }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        .page-title { font-size: 1.5rem; font-weight: 700; margin: 0; letter-spacing: -0.02em; color: var(--text); }
        .table-wrap { overflow-x: auto; border-radius: var(--radius); border: 1px solid var(--border); }
        .table-wrap--scroll { max-height: 70vh; overflow-y: auto; }
        .data-table { width: 100%; border-collapse: collapse; font-size: 0.9375rem; }
        .data-table th, .data-table td { padding: 0.75rem 1rem; text-align: left; border-bottom: 1px solid var(--border); }
        .data-table th { background: #f8fafc; font-weight: 600; color: var(--text); }
        .data-table tr:last-child td { border-bottom: none; }
        .data-table tbody tr:hover { background: #f8fafc; }
        .btn-link {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            font-family: inherit;
            color: var(--accent);
            background: transparent;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            text-decoration: none;
            cursor: pointer;
            transition: border-color 0.2s, background 0.2s;
        }
        .btn-link:hover { background: #f0fdfa; border-color: var(--accent); color: var(--accent-hover); }
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
            font-size: 0.9375rem;
            font-weight: 500;
            font-family: inherit;
            color: var(--text-muted);
            background: none;
            border: none;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 1rem;
            transition: color 0.2s;
        }
        .btn-back:hover { color: var(--accent); }
        .empty-state { text-align: center; padding: 2rem; color: var(--text-muted); }
        .pagination-wrap { margin-top: 1.5rem; display: flex; justify-content: center; }
        .pagination-wrap nav { display: flex; gap: 0.25rem; align-items: center; flex-wrap: wrap; }
        .pagination-wrap a, .pagination-wrap span {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            text-decoration: none;
            color: var(--text);
            background: var(--bg-card);
        }
        .pagination-wrap a:hover { background: #f1f5f9; border-color: #cbd5e1; }
        .pagination-wrap span[aria-current="page"] { background: var(--accent); color: #fff; border-color: var(--accent); }
    </style>
</head>
<body>
<nav class="nav">
    <div class="nav-inner" style="display: flex; justify-content: space-between; align-items: center;">
        <a class="nav-brand" href="{{ route('contacts.index') }}">Contacts</a>
        <a class="btn-link" href="{{ route('contacts.create') }}">Nouveau contact</a>
    </div>
</nav>

<main class="main">
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>
</body>
</html>
