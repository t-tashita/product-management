<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
</head>
<body>
    <!-- 共通ヘッダー -->
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__title">
                mogitate
            </a>
        </div>
    </header>
    <main class="main">
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
                <div class="search">
                    <div class="search__input">
                        <input type="text" class="search__input-text" placeholder="商品名で検索">
                    </div>
                    <div class="search__button">
                        <button class="search__button-submit">
                            検索
                        </button>
                    </div>
                </div>
                <!-- 並び替え機能 -->
                <div class="sort">
                    <div class="sort-title">
                        <h3 class="sort__title">価格順で表示</h3>
                    </div>
                    <div class="sort__input">
                        <select name="fee__order" class="sort__input-select">
                            <option value="" selected>価格で並べ替え</option>
                            <option value="0">高い順に表示</option>
                            <option value="1">低い順に表示</option>
                        </select>
                    </div>
                </div>
            </aside>
            <!-- コンテンツ -->
            <div class="products__content">
                <!-- 商品情報 -->
                <div class="product__info">
                    <img src="{{asset('storage/fruits-img/orange.png')}}" class="product__img">
                    <div class="product__detail">
                        <div class="product__name">オレンジ</div>
                        <div class="product__fee">850円</div>
                    </div>
                </div>
                <div class="product__info">
                    <img src="{{asset('storage/fruits-img/orange.png')}}" class="product__img">
                    <div class="product__detail">
                        <div class="product__name">オレンジ</div>
                        <div class="product__fee">850円</div>
                    </div>
                </div>
                <div class="product__info">
                    <img src="{{asset('storage/fruits-img/orange.png')}}" class="product__img">
                    <div class="product__detail">
                        <div class="product__name">オレンジ</div>
                        <div class="product__fee">850円</div>
                    </div>
                </div>
                <div class="product__info">
                    <img src="{{asset('storage/fruits-img/orange.png')}}" class="product__img">
                    <div class="product__detail">
                        <div class="product__name">オレンジ</div>
                        <div class="product__fee">850円</div>
                    </div>
                </div>
                <div class="product__info">
                    <img src="{{asset('storage/fruits-img/orange.png')}}" class="product__img">
                    <div class="product__detail">
                        <div class="product__name">オレンジ</div>
                        <div class="product__fee">850円</div>
                    </div>
                </div>
                <div class="product__info">
                    <img src="{{asset('storage/fruits-img/orange.png')}}" class="product__img">
                    <div class="product__detail">
                        <div class="product__name">オレンジ</div>
                        <div class="product__fee">850円</div>
                    </div>
                </div>
                <!-- ページネーション -->
                <div class="pagination">
                    <!-- products>links() -->
                     < 1 2 3 >
                </div>
            </div>
        </div>
    </main>
</body>
</html>