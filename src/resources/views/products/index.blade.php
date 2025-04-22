@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="products-content">
    <div class="products-heading">
        <h2 class="products-title">商品一覧</h2>
        <button class="products-add" type="button" name="add">＋商品の追加</button>
    </div>
    <div class="products-details">
        <form action="{{ route('products.index') }}" method="get" class="products-search">
            <div class="search-form">
                <input type="text" name="query" class="search-form__input" placeholder="商品名で検索" value="{{ request('query') }}">
                <button class="search-button" type="submit" value="検索">検索</button>
            </div>
            <div class="search-select">
                <h3 class="select-title">価格順で表示</h3>
                <div class="select-form">
                    <select class="select-list" onchange="window.location.href=this.value">
                        <option value="{{ route('products.index', ['query' => request('query')]) }}" disabled @if (!request('sort')) selected @endif>価格で並び替え</option>
                        @isset($options)
                        @foreach ($options as $key => $value)
                        <option value="{{ route('products.index', ['sort' => $key, 'query' => request('query')]) }}" @if (request('sort')==$key) selected @endif>{{ $value }}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
            </div>
        </form>
        <div class="products-fruits">
            <div class="fruits-grid">
                @foreach ($products as $product)
                <div class="fruits-item">
                    <img class="item-img" src=" {{ asset('storage/' . $product->image) }}" alt="{{$product->name }}">
                    <div class="item-title">
                        <h3 class="item-name">{{ $product->name }}</h3>
                        <p class="item-price">&yen;{{ number_format($product->price) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                {{ $products->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection