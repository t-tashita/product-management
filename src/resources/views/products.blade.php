@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
@endsection

@section('content')
<!-- ヘッダー -->
    <div class="products__heading">
        <h2 class="products__title">
            商品一覧
        </h2>
        <a href="/products/register" class="products__button-resister">
            +商品を追加
        </a>
    </div>
    <div class="products__main">
        <!-- サイドバー -->
        <aside class="products__sidebar">
            <!-- 検索機能 -->
            <form class="search" action="/products/search" method="get">
                @csrf
                <div class="search__input">
                    <input type="text" class="search__input-text" placeholder="商品名で検索" name="keyword" value="{{ old('keyword') }}" >
                </div>
                <div class="search__button">
                    <button class="search__button-submit" type="submit">
                        検索
                    </button>
                </div>
            </form>
            <!-- 並び替え機能 -->
            <div class="sort">
                <div class="sort-title">
                    <h3 class="sort__title">価格順で表示</h3>
                </div>
                <form class="sort__input"  action="/products" method="get">
                    @csrf
                    <select name="fee__order" class="sort__input-select" onchange="this.form.submit()">
                        <option value="" selected>価格で並べ替え</option>
                        <option value="1">高い順に表示</option>
                        <option value="2">低い順に表示</option>
                    </select>
                </form>
            </div>
        </aside>
        <!-- コンテンツ -->
        <div class="products__content">
            @foreach ($products as $product)
            <!-- 商品情報 -->
            <div class="product__info">
                <form class="product__image" action="/products/{{ $product['id'] }}" method="get">
                    @csrf
                    <!-- <input type="hidden" name="product_id" class="product_id" value="{{ $product['id'] }}"> -->
                    <input type='image' name="submit" src="{{asset('storage/fruits-img/' . $product['image']) }}" class="product__img" alt="送信">
                </form>
                <div class="product__detail">
                    <div class="product__name">{{ $product['name'] }}</div>
                    <div class="product__fee">{{ $product['price'] }}円</div>
                </div>
            </div>
            @endforeach
            <div class="product__pagination">
                <!-- ページネーション -->
                {{ $products->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
@endsection