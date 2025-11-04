@extends('layouts.app')
@section('title', 'Edit Produk | Haxovica Store')

@section('content')
<div class="fade-in">
  <div class="card p-4 mx-auto" style="max-width: 700px;">
    <h2 class="text-center fw-bold mb-4" style="color:#ff6f61; letter-spacing:1px;">
      ✏️ Edit Produk — <span style="color:#e6e6e6;">Haxovica Store</span>
    </h2>

    {{-- Error Validation --}}
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-semibold">Nama Produk</label>
          <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Harga (Rp)</label>
          <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Kategori</label>
          <select name="category_id" class="form-select" required>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label fw-semibold">Gambar Produk</label>
          <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
        </div>

        <div class="col-12">
          <label class="form-label fw-semibold">Deskripsi</label>
          <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Preview Gambar Lama / Baru --}}
        <div class="col-12 text-center mt-3">
          @if($product->image)
            <img id="preview" src="{{ asset($product->image) }}" alt="Gambar Lama"
              style="max-width:200px; border-radius:10px; border:2px solid #ff6f61;">
          @else
            <img id="preview" src="#" alt="Preview Gambar" style="display:none; max-width:200px;">
          @endif
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">← Kembali</a>
        <button type="submit" class="btn btn-primary">Update Produk</button>
      </div>
    </form>
  </div>
</div>

<script>
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function(){
    const output = document.getElementById('preview');
    output.src = reader.result;
    output.style.display = 'block';
  };
  reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
