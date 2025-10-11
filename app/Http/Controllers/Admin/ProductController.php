<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SessionSweetAlert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
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
        $categories = Category::all();
        return view('admin.products.views.edit', compact(
            'product',
            'categories'
        ));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        try {
            $updated = $product->update($request->validated());

            if (!$updated) {
                SessionSweetAlert::flashSwal('error', 'No se pudo actualizar el producto', 'inténtalo de nuevo.');
                return back()->withInput();
            }

            SessionSweetAlert::flashSwalToast('success', 'Producto actualizado exitosamente');

            return redirect()->route('admin.products.edit', $product);
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al actualizar el producto', $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(Product $product)
    {
        //
    }
}
