# お問い合わせフォーム  

## 環境構築  

Dockerビルド  

1.git clone git@github.com:t-tashita/product-management  

2.cd product-management  

3.docker-compose up -d --build  

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose .ymlファイルを編集してください  

Laravel環境構築  

1.docker-compose exec php bash  

2.composer install  

3.env.exampleファイルからenvを作成し、環境変数を変更  

4.php artisan key:generate  

5.php artisan migrate  

6.php artisan db seed  

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
