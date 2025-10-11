<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.views.index');
    }

    public function create()
    {
        return view('admin.products.views.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.products.views.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
