<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SessionSweetAlert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.categories.views.index');
    }

    public function create(): View
    {
        return view('admin.categories.views.create');
    }

    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        try {
            $category = Category::create($request->validated());

            if (!$category) {
                SessionSweetAlert::flashSwal('error', 'Ocurrió un error al crear la categoría', 'inténtalo de nuevo.');
                return back()->withInput();
            }

            SessionSweetAlert::flashSwalToast('success', 'Categoría creada exitosamente');

            return redirect()->route('admin.categories.edit', $category);
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al crear la categoría', $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.views.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        try {
            $updated = $category->update($request->validated());

            if (!$updated) {
                SessionSweetAlert::flashSwal('error', 'No se pudo actualizar la categoría', 'inténtalo de nuevo.');
                return back()->withInput();
            }

            SessionSweetAlert::flashSwalToast('success', 'Categoría actualizada exitosamente');

            return redirect()->route('admin.categories.edit', $category);
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al actualizar la categoría', $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy(Category $category): RedirectResponse
    {
        try {
            if ($category->products()->exists()) {
                SessionSweetAlert::flashSwal('error', 'No se puede eliminar la categoría porque tiene productos asociados', null);
                return redirect()->route('admin.categories.index');
            }

            $deleted = $category->delete();

            if (!$deleted) {
                SessionSweetAlert::flashSwal('error', 'No se pudo eliminar la categoría', 'inténtalo de nuevo.');
                return back();
            }

            SessionSweetAlert::flashSwalToast('success', 'Categoría eliminada exitosamente');
            return redirect()->route('admin.categories.index');
        } catch (Exception $e) {
            SessionSweetAlert::flashSwal('error', 'Ocurrió un error al eliminar la categoría', $e->getMessage());
            return back();
        }
    }
}
