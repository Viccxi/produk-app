@extends('layouts.app')
@section('title', 'Haxovica Store | Daftar Produk')

@section('content')
<div class="fade-in">
  {{-- Flash Message --}}
  @if(session('success'))
    <div class="alert alert-success text-center fw-semibold fade-in" style="background-color:#2b2b2b; border:none; color:#ff6f61;">
      {{ session('success') }}
    </div>
  @endif

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4 fade-in">
    <h2 class="fw-bold" style="color:#ff6f61;">
      🛍️ <span style="color:#ff6f61;">Haxovica Store</span> — Daftar Produk
    </h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary shadow">+ Tambah Produk</a>
  </div>

  {{-- Search Bar --}}
  <form action="{{ route('products.index') }}" method="GET" class="mb-3 fade-in">
    <div class="input-group">
      <input type="text" name="search" value="{{ request('search') }}" class="form-control"
        placeholder="Cari produk..." style="background-color:#2b2b2b; color:#fff; border:none;">
      <button class="btn btn-primary px-4" type="submit">Cari</button>
    </div>
  </form>

  {{-- Table --}}
  <div class="card p-3 fade-in">
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

            {{-- Gambar Produk --}}
            <td class="text-center">
              @if($p->image)
                <img src="{{ asset('/Applications/MAMP/htdocs/produk-app/public/storage/products' . $p->image) }}"
                     alt="{{ $p->name }}"
                     style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px; box-shadow: 0 0 8px rgba(255,111,97,0.5); transition: all .3s ease;"
                     onmouseover="this.style.transform='scale(1.2)'; this.style.boxShadow='0 0 15px rgba(255,111,97,0.7)';"
                     onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 0 8px rgba(255,111,97,0.5)';">
              @else
                <span class="text-muted fst-italic">Pengguna tidak mengunggah Gambar</span>
              @endif
            </td>

            <td style="color:#fff;">{{ $p->name }}</td>
            <td style="color:#ccc;">{{ $p->category->name ?? '-' }}</td>
            <td style="color:#ff6f61;">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
            <td style="max-width:200px; color:#e0e0e0;">
              {{ Str::limit($p->description ?? '-', 60) }}
            </td>
            <td class="text-center">
              <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-warning me-1" style="font-weight:600;">Edit</a>
              <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" style="font-weight:600;"
                        onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
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

{{-- Optional Modal Preview Gambar --}}
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark border-0 text-center">
      <div class="modal-body">
        <img id="previewImage" src="" alt="Preview" class="img-fluid rounded shadow-lg">
      </div>
      <button type="button" class="btn btn-secondary mt-2 mb-3" data-bs-dismiss="modal">Tutup</button>
    </div>
  </div>
</div>

<script>
  // Preview Modal Gambar
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('table img').forEach(img => {
      img.style.cursor = 'pointer';
      img.addEventListener('click', () => {
        const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
        document.getElementById('previewImage').src = img.src;
        modal.show();
      });
    });
  });
</script>
@endsection
