<?php


namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesFormRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request) {

        $categories = Category::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
        return view('category.index', compact('categories', 'message'));
    }

    public function create ()
    {
        return view('category.create');
    }

    public function store (CategoriesFormRequest $request)
    {

        $category = Category::create($request->all());
        $request->session()->flash('message',"Categoria {$category->id} criada com sucesso!");
        return redirect()->route('list_categories');
    }

    public function destroy (Request $request)
    {
        Category::destroy($request->id);
        $request->session()->flash('message', "Categoria {$request->id} removida com sucesso!");
        return redirect()->route('list_categories');
    }
}