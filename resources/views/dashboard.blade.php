@extends('layouts.app')
@section('title', 'Dashboard | Haxovica Store')

@section('content')
<div class="fade-in">
  {{-- Header --}}
  <div class="text-center mb-5">
    <h1 class="fw-bold" style="color:#ff6f61; letter-spacing:1px;">🛍️ Haxovica Store Dashboard</h1>
    <p class="text-secondary">Selamat datang kembali, <span class="fw-semibold text-light">{{ Auth::user()->name }}</span>!</p>
    <p class="text-muted">Kelola produk dan kategori Anda dengan mudah dan tampil elegan.</p>
  </div>

  {{-- Summary Cards --}}
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="card text-center p-4 shadow-sm">
        <h4 class="fw-bold text-light">Total Produk</h4>
        <p class="display-5 fw-bold" style="color:#ff6f61;">{{ $totalProducts }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary w-100">Kelola Produk</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center p-4 shadow-sm">
        <h4 class="fw-bold text-light">Total Kategori</h4>
        <p class="display-5 fw-bold" style="color:#ff6f61;">{{ $totalCategories }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary w-100">Kelola Kategori</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center p-4 shadow-sm">
        <h4 class="fw-bold text-light">User Aktif</h4>
        <p class="display-6 text-light">{{ Auth::user()->name }}</p>
        <span class="badge bg-success mt-2">Online</span>
      </div>
    </div>
  </div>

  {{-- Chart Section --}}
  <div class="card p-4 fade-in mb-5" style="background-color:#1f1f1f;">
    <h4 class="fw-bold mb-3 text-center" style="color:#ff6f61;">📊 Produk per Kategori</h4>
    <canvas id="productChart" style="height:350px;"></canvas>
  </div>

  {{-- Quick Actions --}}
  <div class="card p-4 fade-in" style="background-color:#1f1f1f;">
    <h4 class="fw-bold mb-3" style="color:#ff6f61;">⚡ Quick Actions</h4>
    <div class="d-flex flex-wrap gap-3">
      <a href="{{ route('products.create') }}" class="btn btn-outline-light flex-fill">Tambah Produk</a>
      <a href="{{ route('categories.create') }}" class="btn btn-outline-light flex-fill">Tambah Kategori</a>
      <a href="{{ route('products.index') }}" class="btn btn-outline-light flex-fill">Lihat Semua Produk</a>
    </div>
  </div>

  {{-- Footer --}}
  <div class="text-center mt-5 text-muted">
    <small>© {{ date('Y') }} <span style="color:#ff6f61;">Haxovica Code</span> — Elegantly Engineered</small>
  </div>
</div>

{{-- Chart Script --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const ctx = document.getElementById('productChart');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($chartData->pluck('name')) !!},
      datasets: [{
        label: 'Jumlah Produk',
        data: {!! json_encode($chartData->pluck('products_count')) !!},
        backgroundColor: '#ff6f61',
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          labels: { color: '#fff' }
        }
      },
      scales: {
        x: {
          ticks: { color: '#fff' },
          grid: { color: '#333' }
        },
        y: {
          ticks: { color: '#fff' },
          grid: { color: '#333' }
        }
      }
    }
  });
});
</script>
@endsection
