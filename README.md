# Sistem Perhitungan Lembur

Sistem ini merupakan rest api yang dapat menghitung upah lembur pada karyawan. Sistem ini dibuat dengan tujuan untuk menyelesaikan interview skill yang dilaksanakan oleh PT Kledo.

Ada 2 metode perhitungan lembur yang digunakan dalam melakukan perhitungan menggunakan sistem ini.

-   Salary / 173
-   Fixed

Jika yang digunakan adalah metode pertama, maka semua upah lembur dari pegawai yang ada akan dihitung menggunakan metode tersebut. Begitu juga jika yang dipilih adalah metode kedua.
Khusus untuk pegawai dalam masa percobaan, upah lembur mulai dihitung saat durasi lembur lebih dari 1 jam. Saat lebih dari 1 jam, yang dihitung adalah durasi setelah 1 jam tersebut. Namun tidak akan dihitung jika durasi setelah 1 jam belum mencapai 1 jam, aturan ini berlaku kelipatan. Durasi lembur untuk pegawai dalam masa percobaan ini dihitung pada setiap lembur yang dilakukan, bukan dari akumulasi lembur per-bulan.
Contoh hasil perhitungan lembur pegawai dalam masa percobaan seperti berikut.

1. Lembur 2 jam, maka mendapatkan upah lembur 1 jam
2. Lembur 2,5 jam, maka mendapatkan upah lembur 1 jam
3. Lembur 1,5 jam, maka tidak mendapatkan upah lembur
4. Lembur 3,9 jam, maka mendapatkan upah lembur 2 jam
## Cara Menjalankan

1. Setting file .env
2. Created Database "wp-perhitungan-lembur"
3. Jalankan Syntax "php artisan migrate --seed"

## Fitur

1. Dapat Menambah Data Karyawan (Employee) => 'http://127.0.0.1:8000/api/employees' method 'POST'
   -Dengan Mengirimkan Data name, status_id, salary
2. Dapat Melihat Data Karyawan (Employee) => 'http://127.0.0.1:8000/api/employees' methode 'GET'.
   -Dapat juga dengan menambahkan beberapa parameter => per_page, page, order_by, order_type
3. Dapat Mengubah Data Setting Metode Perhitungan => 'http://127.0.0.1:8000/api/employees' method 'PATCH'
   -Dengan Mengirimkan Data key, value
4. Dapat Menambah Data Overtime (Jam Lembur) => 'http://127.0.0.1:8000/api/overtimes' method 'POST'
   -Dengan Mengirimkan Data employee_id, date(YY:mm:dd), time_started (HH:MM), time_ended(HH:MM)
5. Dapat Menampilkan Data Overtime => 'http://127.0.0.1:8000/api/overtimes' method 'GET'
   -Dengan Menambahkan beberapa parameter seperti date_started(YY:mm:dd), date_ended(YY:mm:dd)
6. Dapat Menghitung Gaji Lembur Bulanan => 'http://127.0.0.1:8000/api/overtime-pays/calculate'
   -Dengan Mengirimkan paramater 'month'.

## Dokumnetasi API

Untuk Dokumentasi API dapat diakases menggunakan => 'http://127.0.0.1:8000/api/documentation'

## Testing

Dapat dijalankan dengan menggunakan syntax 'vendor/bin/phpunit'
