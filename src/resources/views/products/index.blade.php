@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/index.css') }}">
@endsection

@section('content')
<div class="products-content">
    <div class="products-heading">
        <h2 class="products-title">
            @if (request('query'))
            "{{ request('query') }}"の商品一覧
            @else
            商品一覧
            @endif
        </h2>
        @if (!request('query'))
        <button class="products-add" type="button" name="add" onclick="location.href='{{ route('products.create') }}'">＋商品の追加</button>
        @endif
    </div>
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
            @if (request('sort') === 'price_asc')
            <span class="tag">価格の安い順 <button type="button" class="tag-remove" onclick="location.href='{{ route('products.index', ['query' => request('query')]) }}'">×</button></span>
            @elseif (request('sort') === 'price_desc')
            <span class="tag">価格の高い順 <button type="button" class="tag-remove" onclick="location.href={{ route('products.index', ['query' => request('query')]) }}">×</button></span>
            @endif
        </div>
    </form>
    <div class="products-fruits">
        <div class="fruits-grid">
            @foreach ($products as $product)
            <div class="fruits-item">
                <a href="{{ route('products.show', ['productId' => $product->id]) }}">
                    <img class="item-img" src=" {{ asset('storage/' . $product->image) }}" alt="{{$product->name }}">
                    <div class="item-title">
                        <h3 class="item-name">{{ $product->name }}</h3>
                        <p class="item-price">&yen;{{ number_format($product->price) }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @if (!request('query') && $products->isNotEmpty())
        <div class="pagination">
            {{ $products->links('vendor.pagination.default') }}
        </div>
        @endif
    </div>
</div>
@endsection