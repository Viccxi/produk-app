@extends('layouts.app')

@section('content')
<div class="container mt-5 fade-in">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #ff6f61;">Welcome, {{ Auth::user()->name }}!</h1>
        <p class="text-secondary">Glad to see you back 👋</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4">
                <h4 class="text-light mb-3">Products</h4>
                <p class="text-secondary">Manage your products easily.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary w-100">Go to Products</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4">
                <h4 class="text-light mb-3">Categories</h4>
                <p class="text-secondary">Organize your product categories.</p>
                <a href="{{ route('categories.index') }}" class="btn btn-primary w-100">Go to Categories</a>
            </div>
        </div>
    </div>
</div>
@endsection
