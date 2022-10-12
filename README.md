### Laravel Relational Database

<p>Belajar laravel relational database melalui studi kasus</p>
<p>Sebelum memakai diharapkan sudah mendownload PHP, Apache, MySQL, dan NodeJS</p>
<p>Jika belum bisa download melalui link berikut ini:</p>

* [xampp](https://www.apachefriends.org/download.html) 
* [laragon](https://laragon.org/download/index.html)
* [nodejs](https://nodejs.org/en/) 

<p>Adapun bebera relationalnya seperti ini:</p>

- One to one
- One to many
- Many to many
- Polymorphic one to one
- Polymorphic one to many
- Polymorphic many to many

<p>Cara pakai </p>

- Clone repo ini dengan ketik $git clone https://github.com/nullsec45/laravel-relational
- Buat database bernama laravel_relational
- Ubah file .env.example -> .env
 
   > DB_CONNECTION=mysql
   >
   > DB_HOST=127.0.0.1
   >
   > DB_PORT=3306
   >
   > DB_DATABASE=laravel
   >
   > DB_USERNAME=root
   >
   > DB_PASSWORD=

   menjadi
   
   > DB_CONNECTION=mysql
   >
   > DB_HOST=127.0.0.1
   >
   > DB_PORT=3306
   >
   > DB_DATABASE=laravel_relational
   >
   > DB_USERNAME=root
   >
   > DB_PASSWORD=

- > $composer install
- > $npm install && npm run dev