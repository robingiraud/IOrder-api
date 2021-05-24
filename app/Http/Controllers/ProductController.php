<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  index () {
        $products = Product::query()->paginate(30);
        return response(ProductResource::collection($products));
    }

    public function store (Request $request) {
        if (!$request->category_id) {
            return response(['error' => 'Veuillez renseigner la catégorie du produit.']);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->keywords = $request->keywords;
        $product->category_id = $request->category_id;
        if ($product->save()) {
            return response($product->id);
        } else {
            return response(['error' => 'Une erreur est survenue lors de  l\'ajout.']);
        }
    }

    public function show ($id) {
        $product = Product::findOrFail($id);
        return response(new ProductResource($product));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->name) $product->name = $request->name;
        if ($request->description) $product->description = $request->description;
        if ($request->price) $product->price = $request->price;
        if ($request->keywords) $product->keywords = $request->keywords;

        return response($product->save());
    }

    public function destroy($id)
    {
        $product  = Product::findOrFail($id);
        return response($product->delete());
    }
}
