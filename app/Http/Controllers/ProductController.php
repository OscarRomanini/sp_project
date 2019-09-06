<?php


namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\CategoriesFormRequest;
use App\Http\Requests\ProductsFormRequest;
use App\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
        return view('product.index', compact('products', 'message'));
    }

    public function create ()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }


    public function store (ProductsFormRequest $request, ProductService $productService)
    {
        $productService->create($request);
        $request->session()->flash('message',"Produto criado com sucesso!");
        return redirect()->route('list_products');
    }

    public function destroy (Request $request, ProductService $productService)
    {
        $productService->destroy($request);
        $request->session()->flash('message', "Produto {$request->id} removido com sucesso!");
        return redirect()->route('list_products');
    }
}