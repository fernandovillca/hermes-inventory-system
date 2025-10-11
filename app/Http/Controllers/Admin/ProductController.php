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
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.views.index');
    }

    public function create(): View
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

            return redirect()->route('admin.products.edit');
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al crear el producto', $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit(Product $product): View
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

    public function destroy(Product $product): RedirectResponse
    {
        try {
            if ($product->inventories()->exists()) {
                SessionSweetAlert::flashSwal('error', 'No se puede eliminar el producto, porque tiene inventarios asociados.', null);
                return redirect()->route('admin.products.index');
            }

            if ($product->purchaseOrders()->exists()) {
                SessionSweetAlert::flashSwal('error', 'No se puede eliminar el producto, porque tiene órdenes de compra asociadas.', null);
                return redirect()->route('admin.products.index');
            }

            if ($product->quotes()->exists()) {
                SessionSweetAlert::flashSwal('error', 'No se puede eliminar el producto, porque tiene cotizaciones asociadas.', null);
                return redirect()->route('admin.products.index');
            }

            $deleted = $product->delete();

            if (!$deleted) {
                SessionSweetAlert::flashSwal('error', 'No se pudo eliminar el producto', 'inténtalo de nuevo.');
                return back();
            }

            SessionSweetAlert::flashSwalToast('success', 'Producto eliminado exitosamente');

            return redirect()->route('admin.products.index');
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al eliminar el producto', $e->getMessage());
            return back();
        }
    }
}
