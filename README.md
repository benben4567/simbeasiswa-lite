<div align="center">
![SIMBEASISWA-1-removebg-preview.png](https://i.postimg.cc/sXt3pWLr/SIMBEASISWA-1-removebg-preview.png)
</div>

## About

SIMBEASISWA (Sistem Informasi Manajemen Beasiswa) merupakan aplikasi untuk pengelolaan beasiswa di Institusi Pendidikan Tinggi. **SIMBEASISWA Lite** merupakan versi sederhana dari SIMBEASISWA yang pernah saya buat sebelumnya, dimana banyak fitur yang dihilangkan (namanya juga lite :smiley:).


## :clipboard: Features

 1. Kelola Jenis Beasiswa 
 2. Kelola Pembukaan Beasiswa
 3. Kelola Program Studi
 4. Kelola Mahasiswa (Penerima) 
 5. Kelola Pengguna
 6. Ekspor Rekapitulasi
 7. *Role Based Access Control*

## :pushpin: To-do

|Fitur|Status|
|--|--|
| Jenis Beasiswa | <center>:white_check_mark:</center> |
| Pembukaan Beasiswa | <center>:white_check_mark:</center> |
| Program Studi | <center>:white_check_mark:</center> |
| Mahasiswa | <center>:white_check_mark:</center> |
| Pengguna | <center>:white_check_mark:</center> |
| Ekspor Rekapitulasi | ``In-progress`` |
| Chart Welcome Page | <center>:soon:</center> |

## Requirement

 - Local server (ex. XAMPP, WAMP, or Laragon) with PHP 7.3+ installed
 - Node.Js
 - Git

## Installation

 1. Clone this repo ``git clone ttps://github.com/benben4567/simbeasiswa-lite.git``
 2. Install PHP dependencies ``composer install``
 3. Install Js dependencies ``npm install``
 4. Create your ``.env``
 5. Run database migration ``php artisan migrate``
 6. Run database seeder  ``php artisan db:seed``
 7. Serve it ``php artisan serve``
 8. Done

## Thanks To

 - [Laravel](https://github.com/laravel/laravel)  for awesome framework
 - [Stisla](https://github.com/stisla/stisla) for beautiful bootstrap template
