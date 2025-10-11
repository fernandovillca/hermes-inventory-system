<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SessionSweetAlert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.views.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.views.create', compact(
            "categories"
        ));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        try {
            $product = Product::create($request->validated());

            if (!$product) {
                SessionSweetAlert::flashSwal('error', 'Ocurrió un error al crear el producto', 'inténtalo de nuevo.');
                return back()->withInput();
            }

            SessionSweetAlert::flashSwalToast('success', 'Producto creado exitosamente');

            return redirect()->route('admin.products.index');
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al crear el producto', $e->getMessage());
            return back()->withInput();
        }
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
