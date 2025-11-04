@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<div class="fade-in">
  <div class="card p-4 mx-auto" style="max-width: 500px;">
    <h2 class="text-center fw-bold mb-4" style="color:#ff6f61;">✏️ Edit Kategori</h2>

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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label fw-semibold">Nama Kategori</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required>
      </div>

      <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">← Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>
@endsection
