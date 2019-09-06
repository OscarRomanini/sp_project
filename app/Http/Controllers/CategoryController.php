<?php


namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesFormRequest;
use App\Product;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request, CategoryService $categoryService) {

        $categories = $categoryService->getAll();
        $message = $request->session()->get('message');
        return view('category.index', compact('categories', 'message'));
    }

    public function create ()
    {
        return view('category.create');
    }

    public function edit (Request $request)
    {
        $category = Category::find($request->id);
        return view('category.create', compact('category'));
    }

    public function update(CategoriesFormRequest $request, CategoryService $categoryService)
    {
        $category = Category::find($request->id);
        $categoryService->update($category, $request);
        $request->session()->flash('message', "Categoria {$request->id} atualizada com sucesso!");
        return redirect()->route('list_categories');
    }

    public function store (CategoriesFormRequest $request, CategoryService $categoryService)
    {
        $categoryService->save($request);
        $request->session()->flash('message',"Categoria criada com sucesso!");
        return redirect()->route('list_categories');
    }

    public function destroy (Request $request, CategoryService $categoryService)
    {
        $categoryService->destroy($request);
        $request->session()->flash('message', "Categoria {$request->id} removida com sucesso!");
        return redirect()->route('list_categories');
    }
}