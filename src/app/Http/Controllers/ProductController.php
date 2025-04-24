<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $sort = $request->input('sort');
        $query = $request->input('query');

        $products = Product::query();

        if ($query) {
            $products->where('name', 'LIKE', "%{$query}%");
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


        $products = $products->paginate(6)->withQueryString();;

        $options = [
            'price_desc' => '価格が高い順',
            'price_asc' => '価格が安い順',
        ];

        $isSearch = !empty($query);


        return view('products.index', compact('products', 'options', 'query'));
    }


    public function show(int $productId)
    {
        $product = Product::findOrFail($productId);

        return view('products.show', compact('product'));
    }

    public function edit(int $productId)
    {
        $product = Product::findOrFail($productId);

        dd('確認した');
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, int $productId)
    {
    

        $product = Product::findOrFail($productId);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $imagePath = $request->file('image')->store('public/products');
            $validatedData['image'] = str_replace('public/', '', $imagePath);
        }

        $product->update($validatedData);
        return redirect()->route('products.show', $productId);
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

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products'); 
            $validatedData['image'] = str_replace('public/', '', $imagePath); 
        }


        $product = Product::create($validatedData);

        if ($request->has('seasons')) {
            $product->seasons()->attach($request->input('seasons'));
        }

        return redirect()->route('products.index');
    }

    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
        return redirect()->route('products.index');
    }
}
