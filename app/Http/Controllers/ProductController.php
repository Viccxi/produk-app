<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::with('category')
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Pastikan folder publik tersedia
        if (!Storage::disk('public')->exists('products')) {
            Storage::disk('public')->makeDirectory('products');
        }

        $imageName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->storeAs('products', $imageName, 'public');
        }

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'category_id', 'description']);

        // Pastikan folder storage tersedia
        if (!Storage::disk('public')->exists('products')) {
            Storage::disk('public')->makeDirectory('products');
        }

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
            $file->storeAs('products', $imageName, 'public');
            $data['image'] = $imageName;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists('products/' . $product->image)) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
