<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <style>
    /* Force style agar menimpa Bootstrap atau Tailwind */
    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="password"],
    textarea,
    select {
        background-color: #1e1e1e !important;
        color: #f5f5f5 !important;
        border: 1px solid #555 !important;
        border-radius: 8px !important;
        padding: 10px !important;
        width: 100% !important;
    }

    input::placeholder,
    textarea::placeholder {
        color: #aaa !important;
    }

    input:focus,
    textarea:focus,
    select:focus {
        border-color: #ff6f61 !important;
        box-shadow: 0 0 6px #ff6f61 !important;
        outline: none !important;
    }

    label {
        color: #fff !important;
    }

    body {
        background: radial-gradient(circle at top left, #1a1a1a, #121212);
        color: #fff;
        font-family: 'Segoe UI', sans-serif;
    }

    .card {
        background: #1f1f1f;
        border-radius: 16px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 0 20px rgba(255, 111, 97, 0.2);
    }

    .btn-primary {
        background: linear-gradient(45deg, #ff6f61, #ff8574);
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #ff4b3e, #ff6f61);
        transform: scale(1.03);
        box-shadow: 0 0 10px rgba(255, 111, 97, 0.4);
    }

    /* Fade-in */
    .fade-in {
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.6s forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .navbar, .card {
      background-color: #1f1f1f !important;
      border: none;
    }
    .btn-primary {
      background-color: #ff6f61;
      border-color: #ff6f61;
    }
    .btn-primary:hover {
      background-color: #ff8a75;
    }
    .form-control, .form-select {
      background-color: #2b2b2b;
      color: #fff;
      border: 1px solid #444;
    }
    .form-control:focus, .form-select:focus {
      border-color: #ff6f61;
      box-shadow: 0 0 0 0.2rem rgba(255,111,97,0.25);
    }
    table {
      color: #ddd;
    }
    table thead th {
      color: #ff6f61;
    }
    /* Input dan Textarea di Dark Mode */
    input[type="text"],
    input[type="number"],
    textarea,
    select {
        background-color: #1e1e1e;
        color: #f5f5f5;
        border: 1px solid #444;
        border-radius: 8px;
        padding: 10px;
        width: 100%;
    }
    input[type="text"]::placeholder,
    input[type="number"]::placeholder,
    textarea::placeholder {
        color: #aaa;
    }
    input:focus,
    textarea:focus,
    select:focus {
        border-color: #ff6f61;
        outline: none;
        box-shadow: 0 0 4px #ff6f61;
    }
    /* Bonus tombol elegan */
    button, .btn {
        background-color: #ff6f61;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    button:hover, .btn:hover {
        background-color: #ff4b3e;
    }
  </style>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.fade-in').forEach((el, i) => {
            el.style.animationDelay = `${i * 0.1}s`;
        });
    });
  </script>
</head>
<body>
  <nav class="navbar navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">🛍️ Laravel Store</a>
      <div>
        @auth
          <a href="{{ route('products.index') }}" class="text-light me-3">Produk</a>
          <a href="{{ route('categories.index') }}" class="text-light me-3">Kategori</a>
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        @endauth
      </div>
    </div>
  </nav>

  <div class="container py-4">
    @yield('content')
  </div>
</body>
</html>
