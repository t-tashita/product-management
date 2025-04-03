@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection

@section('content')
    <form class="main-content" action="/products/{{ $product['id'] }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="main-header">
            <label class="main-header__path">
                <a href="/products" class="main-header__product-link">商品一覧</a> > {{ $product['name'] }}
            </label>
        </div>
        <div class="main-product">
            <div class="main-product__image">
                <img id="imagePreview" src="{{asset('storage/fruits-img/' . $product['image']) }}" alt="アップロードした画像がここに表示されます" class="main-product__image-img" >
                <input type="file" id="fileInput" class="main-product__image-file" accept="image/png, image/jpeg, image/jpg" name="image">
            </div>
            <div class="main-product__info">
                <label class="main-product__info-name">商品名</label>
                <input type="text" class="main-product__info-name--input" name="name" value="{{ $product['name'] }}">
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
                <label class="main-product__info-price">値段</label>
                <input type="text" class="main-product__info-price--input" name="price" value="{{ $product['price'] }}">
                <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>

                <label class="main-product__info-season">季節</label>
                <div class="main-product__info-season--input">
                    @foreach ($seasons as $season)
                        <label ><input type="checkbox" name="season_id[]" value="{{ $season->id }}"{{ $product->seasons->contains($season->id) ? 'checked' : '' }} />{{ $season['name'] }}</label>
                    @endforeach
                    <div class="form__error">
                        @error('season_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="main-description">
            <label class="main-description-title">商品説明</label>
            <textarea class="main-description--textarea" name="description">{{ $product['description'] }}</textarea>
            <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="main-footer">
            <div class="main-footer__button">
                <button class="main-footer__back" type="button" onclick="window.history.back();">戻る</button>
                <button class="main-footer__update" type=submit>変更を保存</button>
            </div>
        </div>
    </form>
    <form action="/products/{{ $product['id'] }}/delete" method="POST">
        @csrf
        <button type="submit" class="main-footer__delete"><img src="{{asset('storage/trash-icon.png') }}" class="main-footer__delete-image"></button>
        </form>
@endsection

@section('script')
    <script>
        // ファイル選択が変更されたときの処理
        document.getElementById('fileInput').addEventListener('change', function(event) {
            // ファイルが選択されている場合
            if (event.target.files && event.target.files[0]) {
                var file = event.target.files[0];

                // ファイルのタイプが PNG または JPEG でない場合
                if (file.type !== 'image/png' && file.type !== 'image/jpeg') {
                    alert('PNG または JPEG の画像ファイルを選択してください。');
                    return;
                }

                var reader = new FileReader();

                // ファイルが読み込まれたときに実行される
                reader.onload = function(e) {
                    // 読み込んだファイルのURLを<img>タグのsrc属性に設定
                    document.getElementById('imagePreview').src = e.target.result;
                };
                // 選択したファイルを読み込む（Data URLとして）
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection