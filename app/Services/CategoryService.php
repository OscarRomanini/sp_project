<?php


namespace App\Services;


use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function getAll()
    {
        return Category::query()->orderBy('name')->get();
    }

    public function save($request)
    {
        DB::transaction(function() use($request){
            return Category::create($request->all());
        });
    }

    public function update($category, $request)
    {
        DB::transaction(function () use($category, $request) {

            $category->name = $request->input('name');
            $category->save();
        });
    }

    public function destroy($request)
    {
        DB::transaction(function () use(&$request) {
            $category = Category::find($request->id);
            $category->products()->each(function (Product $product) {
            $product->delete();
        });
        Category::destroy($request->id);
        });
    }
}