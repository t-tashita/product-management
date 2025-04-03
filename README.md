# mogitate(商品管理サイト)  

## 環境構築  

Dockerビルド  

1.`git clone git@github.com:t-tashita/product-management`  

2.`cd product-management`  

3.`docker-compose up -d --build`  

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose .ymlファイルを編集してください  

Laravel環境構築  

1.`docker-compose exec php bash`  

2.`composer install`  

3.env.exampleファイルからenvを作成し、環境変数を変更  

`cp .env.example .env`  

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

4.アプリケーションキーの作成　　
`php artisan key:generate`  

5.マイグレーションの実行　　
`php artisan migrate`  

6.シーディングの実行  
`php artisan db:seed`  

# 使用技術  

・nginx:1.21.1  
・PHP  7.4.9  
・Laravel  8.83.8  
・MySQL 8.0.26  

# ER図  
![image](https://github.com/user-attachments/assets/1f656c77-b779-4688-a69d-28363a52ee1f)  

# URL  
・開発環境:http://localhost/products  
・phpMyAdmin:http://localhost:8080/  
