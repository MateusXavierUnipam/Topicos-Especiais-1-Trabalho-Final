<!doctype html>
<html lang="pt-BR" data-bs-theme="{{ \Illuminate\Support\Facades\Cookie::get('theme', 'light') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabalho Final</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Sistema Laravel</a>
    
    @auth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a></li>
            </ul>
            
            <div class="d-flex align-items-center gap-3">
                <!-- Toggle Tema (Cookie) -->
                <a href="{{ route('toggle.theme') }}" class="btn btn-sm btn-outline-secondary">
                    @if(\Illuminate\Support\Facades\Cookie::get('theme') === 'dark')
                        <i class="fas fa-sun"></i>
                    @else
                        <i class="fas fa-moon"></i>
                    @endif
                </a>

                <span class="navbar-text">{{ Auth::user()->name }}</span>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-danger" type="submit">Sair</button>
                </form>
            </div>
        </div>
    @endauth
  </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>