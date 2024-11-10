# Monitoring CCTV

Proyek ini bertujuan untuk memantau CCTV menggunakan teknologi terbaru.

## Fitur

- Pemantauan real-time
- Pemberitahuan otomatis
- Penyimpanan rekaman
- Analisis video

## Instalasi

1. Clone repositori ini:
    ```bash
    git clone https://github.com/username/monitoringCCTV.git
    ```
2. Masuk ke direktori proyek:
    ```bash
    cd monitoringCCTV
    ```
3. Instal dependensi menggunakan Composer:
    ```bash
    composer install
    ```
4. Salin file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```
5. Generate key aplikasi:
    ```bash
    php artisan key:generate
    ```

## Penggunaan

1. Jalankan server pengembangan Laravel:
    ```bash
    php artisan serve
    ```
2. Buka browser dan akses `http://localhost:8000`.

## Kontribusi

Silakan buat pull request untuk kontribusi. Kami menerima berbagai jenis kontribusi, termasuk perbaikan bug, fitur baru, dan dokumentasi.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
