@extends('layouts.app')
@section('title', 'Daftar Produk')

@section('content')
<div class="fade-in">
  {{-- Flash Message --}}
  @if(session('success'))
    <div class="alert alert-success text-center fw-semibold">
      {{ session('success') }}
    </div>
  @endif

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-[#ff6f61]" style="color:#ff6f61;">📦 Daftar Produk</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
  </div>

  {{-- Search Bar --}}
  <form action="{{ route('products.index') }}" method="GET" class="mb-3">
    <div class="input-group">
      <input type="text" name="search" value="{{ request('search') }}" class="form-control"
        placeholder="Cari produk..." style="background-color:#2b2b2b; color:#fff; border:none;">
      <button class="btn btn-primary" type="submit">Cari</button>
    </div>
  </form>

  {{-- Table --}}
  <div class="card p-3">
    <div class="table-responsive">
      <table class="table table-dark table-hover align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $i => $p)
          <tr class="fade-in">
            <td>{{ $loop->iteration }}</td>
            <td>
              @if($p->image)
                <img src="{{ asset($p->image) }}" alt="img" class="rounded" style="width:60px; height:60px; object-fit:cover;">
              @else
                <span class="text-muted fst-italic">Tidak ada</span>
              @endif
            </td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name ?? '-' }}</td>
            <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td class="text-muted" style="max-width:200px;">{{ Str::limit($p->description, 50) }}</td>
            <td class="text-center">
              <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
              <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7" class="text-center text-secondary py-4 fst-italic">Belum ada produk ditambahkan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>
  </div>
</div>
@endsection
