@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/show.css') }}">
@endsection

@section('content')
<div class="product-content">
    <a href="{{ route('products.index') }}" class="index-link">商品一覧 </a>
    <span class="product-name">> {{ $product->name }}</span>
    <form action="{{ route('products.update', ['productId' => $product->id]) }}" method="post" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('put')
        <div class="product-detail">
            <div class="product-img">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <input type="file" name="image" id="image" class="input-img">
                @error('image')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="product-info">
                <div class="form-group">
                    <label for="productName" class="form-name">商品名</label>
                    <div class="form-input">
                        <input type="text" id="productName" name="name" class="input-text" value="{{ $product->name }}">
                        @error('name')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="productName" class="form-name">値段</label>
                    <div class="form-input">
                        <input type="number" id="productPrice" name="price" min="0" class="input-text" value="{{ $product->price }}">
                        @error('price')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group__season">
                    <label for="productSeason" class="form-name">季節</label>
                    <div class="checkbox-group">
                        <div class="checkbox-button">
                            <input type="checkbox" name="season[]" value="spring" id="spring" class="checkbox-input" {{ $product->season === 'spring' ? 'checked' : '' }}>
                            <label for="spring" class="checkbox-label"><span class="custom-checkbox"></span>春</label>
                        </div>
                        <div class="checkbox-button">
                            <input type="checkbox" name="season[]" value="summer" id="summer" class="checkbox-input" {{ $product->season === 'summer' ? 'checked' : '' }}>
                            <label for="summer" class="checkbox-label"><span class="custom-checkbox"></span>夏</label>
                        </div>
                        <div class="checkbox-button">
                            <input type="checkbox" name="season[]" value="autumn" id="autumn" class="checkbox-input" {{ $product->season === 'autumn' ? 'checked' : '' }}>
                            <label for="autumn" class="checkbox-label"><span class="custom-checkbox"></span>秋</label>
                        </div>
                        <div class="checkbox-button">
                            <input type="checkbox" name="season[]" value="winter" id="winter" class="checkbox-input" {{ $product->season === 'winter' ? 'checked' : '' }}>
                            <label for="winter" class="checkbox-label"><span class="custom-checkbox"></span>冬</label>
                        </div>
                    </div>
                    @error('season.*')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="product-explanation">
            <div class="explanation-title">
                商品説明
            </div>
            <textarea name="description" id="productDescription" rows="5">{{ $product->description }}</textarea>
        </div>
        <div class="button-group">
            <a href="{{ route('products.index') }}" class="cancel-button">戻る</a>
            <button type="submit" class="submit-button">更新</button>
            <button type="button" class="delete-button" onclick="if (confirm('本当に削除しますか？')) { document.getElementById('delete-form').submit(); }">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 13 4v9a1 1 0 0 0 1 1h-8a1 1 0 0 0 1-1V4zM6 1.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1z" />
                </svg>
            </button>
        </div>
    </form>
    <form id="delete-form" action="{{ route('products.destroy', ['productId' => $product->id]) }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endsection