# Online Shopping Reworked
Online Shopping Reworked adalah toko online berbasis web yang menggunakan lumen sebagai frameworknya. Tujuan pembuatan project ini adalah sebagai salah satu syarat kelulusan 'Pemrosesan Data Tersebar'

## Proses
Pada saat ini project sudah mampu melakukan:
- Login dan Register
- Melihat list barang dan jumlah stock yang ada antar kantor/cabang
- Memasukkan barang ke keranjang
- Membeli barang yang ada di keranjang
- Membeli barang khusus per kantor/cabang
- Jumlah stock barang per kantor langsung berkurang

Rencana penambahan fitur pada project ini adalah:
- Menghapus keranjang
- Melihat history transaksi

## Cara Installasi
### Requirement
- LAMP (Linux) or XAMPP (Windows)
- Composer

### Instalasi
- Download atau clone project
- Cari project kemudian extract di folder mana saja yang anda inginkan
- Buka Terminal (Command Prompt), kemudian change directory (cd) ke lokasi tersebut
- run 'composer install'
- ubah nama file '.env.example' menjadi '.env', atau copy paste file tersebut dan ubah namanya menjadi demikian
- buka file tersebut, kemudian ganti nama database menjadi 'TokoKomputer', ubah nama DB_Username dan DB_Password sesuai ketentuan database anda
- Create database di database anda dengan nama 'TokoKomputer'
- buka kembali Terminal (Command Prompt), kemudian run 'php artisan migrate'
- Jika sudah selesai run 'php -S localhost:8000 -t public', kemudian akses project lewat browser dengan mengetik url 'localhost:8000'

# WIP
