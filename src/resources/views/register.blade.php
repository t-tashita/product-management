@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
    <div class="main__heading">
        商品登録
    </div>
    <form class="form" action="/products/register" method="post" enctype="multipart/form-data">
        @csrf
        <!-- 商品名 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品名</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 値段 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">値段</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
                </div>
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 商品画像 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品画像</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--file">
                <!-- <img id="imagePreview" src="" alt="" class="main-product__image-img" > -->
                <input type="file"  name="image" id="fileInput">
                </div>
                <div class="form__error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 季節 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">季節</span>
                <span class="form__label--required">必須</span>
                <span class="form__label--required-notice">複数選択可</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--check">
                    @foreach ($seasons as $season)
                        <label ><input type="checkbox" name="season_id[]" value="{{  $season->id  }}">{{ $season->name }}</label>
                    @endforeach
                </div>
                <div class="form__error">
                    @error('season_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 商品説明 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品説明</span>
                <span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                </div>
                <div class="form__error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-back" type="button" onclick="window.history.back();">戻る</button>
            <button class="form__button-submit" type="submit">登録</button>
        </div>
    </form>
@endsection