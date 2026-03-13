<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de contacts')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/contacts.css') }}" rel="stylesheet">
</head>
<body>
<nav class="nav">
    <div class="nav-inner">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/delete-confirm.js') }}"></script>
</body>
</html>
