# Panen-app

### How to run

- Run server:

    Sesuaikan env database

    `
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=panen_app_db
        DB_USERNAME=root
        DB_PASSWORD=
    `

    Jalankan migration & seeder
    ```bash
    php artisan migrate:fresh --seed
    ```

    Run app
    ```bash
    php artisan serve
    ```

    Setelah selesai API bisa diakses di localhost:8000, untuk detail endpoint yaitu sebagai berikut.

    - localhost:8000 (Tampilan Frontend Reporting)
    - localhost:8000/api/hasilpanen (API get all data hasil panen)
    - localhost:8000/api/report (API untuk reporting)
