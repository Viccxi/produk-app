@extends('layouts.app')
@section('title', 'Daftar Kategori')

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
    <h2 class="fw-bold" style="color:#ff6f61;">📚 Daftar Kategori</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
  </div>

  {{-- Search Bar --}}
  <form action="{{ route('categories.index') }}" method="GET" class="mb-3">
    <div class="input-group">
      <input type="text" name="search" value="{{ request('search') }}" class="form-control"
        placeholder="Cari kategori..." style="background-color:#2b2b2b; color:#fff; border:none;">
      <button class="btn btn-primary" type="submit">Cari</button>
    </div>
  </form>

  {{-- Table --}}
  <div class="card p-3">
    <div class="table-responsive">
      <table class="table table-dark table-hover align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($categories as $index => $category)
          <tr class="fade-in">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td class="text-center">
              <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
              <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="btn btn-sm btn-danger">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center text-secondary py-4 fst-italic">Belum ada kategori ditambahkan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
      {{ $categories->links('pagination::bootstrap-5') }}
    </div>
  </div>
</div>
@endsection
