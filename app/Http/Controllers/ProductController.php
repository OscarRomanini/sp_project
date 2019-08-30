<?php


namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\CategoriesFormRequest;
use App\Http\Requests\ProductsFormRequest;
use App\Product;
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

    public function store (ProductsFormRequest $request)
    {
        $product = Product::create($request->all());
        $request->session()->flash('message',"Produto {$product->id} criado com sucesso!");
        return redirect()->route('list_products');
    }

    public function destroy (Request $request)
    {
        Product::destroy($request->id);
        $request->session()->flash('message', "Produto {$request->id} removido com sucesso!");
        return redirect()->route('list_products');
    }
}