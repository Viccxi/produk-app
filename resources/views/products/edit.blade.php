@extends('layouts.app')
@section('title', 'Edit Produk')

@section('content')
<div class="fade-in">
  <div class="card p-4 mx-auto" style="max-width:700px;">
    <h2 class="text-center fw-bold mb-4" style="color:#ff6f61;">✏️ Edit Produk</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
          @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
              {{ $cat->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
      </div>

      <div class="mb-4">
        <label class="form-label">Gambar Produk</label>
        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
        <div class="mt-3 text-center">
          @if($product->image)
            <img id="preview" src="{{ asset('storage/products/'.$product->image) }}" class="rounded shadow" style="max-height:200px;">
          @else
            <p class="text-muted fst-italic mt-2">Pengguna tidak mengunggah Gambar</p>
            <img id="preview" src="#" style="display:none; max-height:200px;">
          @endif
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
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
