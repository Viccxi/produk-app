@extends('layouts.app')
@section('title', 'Tambah Kategori')

@section('content')
<div class="fade-in">
  <div class="card p-4 mx-auto" style="max-width: 500px;">
    <h2 class="text-center fw-bold mb-4" style="color:#ff6f61;">🆕 Tambah Kategori</h2>

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

    <form action="{{ route('categories.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Kategori</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Masukkan nama kategori" required>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
