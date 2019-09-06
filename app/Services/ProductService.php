<?php


namespace App\Services;


use App\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function create($request)
    {
        DB::transaction(function () use($request){
            return Product::create($request->all());
        });
    }

    public function destroy($request)
    {
        DB::transaction(function () use ($request) {
        return Product::destroy($request->id);
        });
    }
}