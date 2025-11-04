@extends('layouts.app')
@section('title', 'Tambah Produk')

@section('content')
<div class="fade-in">
  <div class="card p-4 mx-auto" style="max-width:700px;">
    <h2 class="text-center fw-bold mb-4" style="color:#ff6f61;">🆕 Tambah Produk</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
          <option value="">-- Pilih Kategori --</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label">Gambar Produk</label>
        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
        <div class="mt-3 text-center">
          <img id="preview" src="#" alt="" class="rounded shadow" style="display:none; max-height:200px;">
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
function previewImage(event) {
  const img = document.getElementById('preview');
  img.src = URL.createObjectURL(event.target.files[0]);
  img.style.display = 'block';
}
</script>
@endsection
