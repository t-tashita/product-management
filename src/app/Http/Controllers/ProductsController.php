<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    // 一覧画面
    public function index(Request $request)
    {
        $sortKey = $request->fee__order;
        $products = Product::sort($sortKey)->Paginate(6);
        return view('products', compact('products'));
    }
    public function search(Request $request)
    {
        $products = Product::KeywordSearch($request->keyword)->Paginate(6);
        return view('products', compact('products'));
    }

        // 登録画面
    public function register()
    {
        $seasons = Season::get();
        return view('register', compact('seasons'));
    }
    public function store(ProductRequest $request)
    {
        // ファイルの保存
        $path = $request->file('image')->store('public/fruits-img');
        // 商品情報の登録
        $productData = $request->only(['name', 'price', 'description']);
        $productData['image'] = basename($path);
        $product = Product::create($productData);
        // 季節情報の登録
        $seasonIds = $request->input('season_id', []);
        $product->seasons()->attach($seasonIds);
        return redirect('/products');
    }

    // 詳細画面
    public function detail($productId)
    {
        $product = Product::where('id', $productId)->first();
        $seasons = Season::get();
        return view('detail', compact('product', 'seasons'));
    }
    public function update(Request $request, $productId)
    {
        $productData = $request->only(['name', 'price', 'description']);
        Product::find($productId)->update($productData);
        $product = Product::where('id', $productId)->first();
        $seasonIds = $request->input('season_id', []);
        $product->seasons()->sync($seasonIds);
        return redirect('/products');
    }
    public function destroy($productId)
    {
        Product::find($productId)->delete();
        return redirect('/products');
    }
}