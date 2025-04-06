<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Auth' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card shadow p-4" style="min-width: 400px;">
        <div class="text-center mb-3">
            <h2>{{ $title ?? 'Bem-vindo' }}</h2>
            <p class="text-muted">{{ $subtitle ?? '' }}</p>
        </div>
        {{ $slot }}
    </div>
</body>
</html>
