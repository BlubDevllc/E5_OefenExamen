<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_deleted', false)
            ->where('status', 'active')
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric|min:0',
        ]);

        Product::create([
            'maker_id' => auth()->id(),
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'prijs' => $request->prijs,
        ]);

        return redirect()->route('products.index')->with('success', 'Product succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if ($product->maker_id !== auth()->id()) {
            abort(403);
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if ($product->maker_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'prijs' => 'required|numeric|min:0',
        ]);

        $product->update([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'prijs' => $request->prijs,
        ]);

        return redirect()->route('products.show', $product)->with('success', 'Product succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->maker_id !== auth()->id()) {
            abort(403);
        }

        $product->update(['is_deleted' => true]);

        return redirect()->route('products.index')->with('success', 'Product succesvol verwijderd!');
    }
}
