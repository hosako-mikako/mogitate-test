<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $sort = $request->input('sort');
        $query = $request->input('query');

        $products = Product::query();

        if ($query) {
            $products->where('name', 'like', "%{$query}%")->orWhere('description', 'like', "%{$query}%");
        }

        switch ($sort) {
            case 'price_asc':
                $products->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $products->orderBy('price', 'desc');
                break;
            default:
                $products->orderBy('created_at', 'desc');
                break;
        }

        $products = $products->paginate(6);

        $options = [
            'price_desc' => '価格が高い順',
            'price_asc' => '価格が安い順',
        ];

        return view('products.index', compact('products', 'options'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        return redirect()->route('products.index', ['query' => $request->input('query')]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {

        $validatedData = $request->validated();
        // 商品を登録
        $product = Product::create($validatedData);
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        $product->update($validatedData);
        return redirect()->route('products.show', $product);
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
