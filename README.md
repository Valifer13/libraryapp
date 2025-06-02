sebelum menjalankan program, ikutin tahap tahap berikut: 
1. buka terminal pada folder projek 
2. jalankan composer install
3. jalankan npm i 
4. ubah nama .env.example menjadi .env
5. jalankan php artisan key:generate di terminal 
5. hubungkan database dengan merubah nama env DB\_DATABASE menjadi nama database di sql 
6. jalankan php artisan migrate untuk menambahkan table 
7. jalankan php artisan serve
8. buka terminal ke 2 dan jalankan npm run dev
