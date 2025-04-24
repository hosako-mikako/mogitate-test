@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products/create.css') }}">
@endsection

@section('content')
<div class="create-content">
    <h2 class="create-title">商品登録</h2>
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="create-form">
        @csrf
        <div class="form-group">
            <label for="productName" class="form-name">商品名<span class="required">必須</span></label>
            <div class="form-input">
                <input type="text" id="productName" name="name" placeholder="商品名を入力" class="input-text">
                @error('name')
                <div class="error-message">
                    @foreach ($errors->get('name') as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="productPrice">値段<span class="required">必須</span></label>
            <input type="number" id="productPrice" name="price" min="0" placeholder="値段を入力" class="input-text">
            @error('price')
            <div class="error-message">
                @foreach ($errors->get('price') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @enderror
        </div>

        <div class="form-group__img">
            <div class="image-preview-wrapper">
                <img id="imagePreview" src="#" alt="プレビュー" class="image-preview" style="display: none;">
            </div>
            <label for="productImage">商品画像 <span class="required">必須</span></label>
            <input type="file" id="productImage" name="image" accept="image/*" placeholder="商品の説明を入力" class="input-img">
            @error('image')
            <div class="error-message">
                @foreach ($errors->get('image') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="productSeason">季節 <span class="required">必須</span><span class="select-multiple">複数選択可</span></label>
            <div class="checkbox-group">
                <div class="checkbox-button">
                    <input type="checkbox" name="season[]" value="spring" id="spring" class="checkbox-input">
                    <label for="spring" class="checkbox-label"><span class="custom-checkbox"></span>春</label>
                </div>
                <div class="checkbox-button">
                    <input type="checkbox" name="season[]" value="summer" id="summer" class="checkbox-input">
                    <label for="summer" class="checkbox-label"><span class="custom-checkbox"></span>夏</label>
                </div>
                <div class="checkbox-button">
                    <input type="checkbox" name="season[]" value="autumn" id="autumn" class="checkbox-input">
                    <label for="autumn" class="checkbox-label"><span class="custom-checkbox"></span>秋</label>
                </div>
                <div class="checkbox-button">
                    <input type="checkbox" name="season[]" value="winter" id="winter" class="checkbox-input">
                    <label for="winter" class="checkbox-label"><span class="custom-checkbox"></span>冬</label>
                </div>
            </div>
            @error('seasons.*')
            <div class="error-message">
                @foreach ($errors->get('seasons.*') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @enderror
        </div>
        <div class="form-group__explanation">
            <label for="productDescription">商品説明 <span class="required">必須</span></label>
            <textarea id="productDescription" name="description" rows="5" placeholder="商品の説明を入力"></textarea>
            @error('description')
            <div class="error-message">
                @foreach ($errors->get('description') as $error)
                <div>{{ $error }}</div>
                @endforeach
            </div>
            @enderror
        </div>
        <div class="button-group">
            <a href="{{ route('products.index') }}" class="cancel-button">戻る</a>
            <button type="submit" class="submit-button">登録</button>
        </div>
    </form>
</div>
@endsection