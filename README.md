# Skeleton Backend Service

Deskripsi service disini, untuk aplikasi apa dan sebagainya

## Development

Pertama close repository ini menggunakan git

```bash
git clone git@github.com:atInisiatifZakat/skeleton-backend-service.git
```

Copy `.env.example` menjadi `.env` lalu sesuaikan value - value nya,
berikut ini ada adalah contoh minimal `env`

```dotenv
APP_NAME="Outflows"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=daily

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=skeleton
DB_USERNAME=postgres
DB_PASSWORD=

MAIL_MAILER=array

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

INISIATIF_USER_RUNNING_MIGRATION=true
```

jalan kan perintah 

```bash
php artisan key:generate
```

Buat table dan isi dengan data user dummy

```bash
php artisan migrate --seed
```
secara default akan seeder akan membuat dua user berbeda

```text
Nama : User Pusat
Cabang : Pusat
Email : user.pusat@izi.or.id

Nama : User DKI Jakarta
Cabang : DKI Jakarta
Email : user.jakarta@izi.or.id
```
Buka postman lalu buat token dengan melalukan request `post` pada url `/api/auth/token` dengan `email` dan `password`
yang sesuai.

## Testing

Sebelum menjalankan testing pastikan postgres sudah terinstall dan sudah ada database `testing`, sesuai konfigurasi
berikut

```xml
<php>
    <env name="DB_CONNECTION" value="pgsql"/>
    <server name="DATABASE_URL" value="pgsql://postgres:password@127.0.0.1:5432/testing?charset=UTF-8"/>
</php>
```

lalu jalankan perintah 

```bash
composer test
```

apabila config database berbeda bisa mengcopy file `phpunit.xml` menjadi `phpunit.local.xml` lalu sesuaikan koneksi
database-nya, setelah itu untuk melakukan testing jalankan

```bash
composer test-local
```

## Code Style

Project ini menggunakan [Laravel Pint](https://laravel.com/docs/10.x/pint#main-content) untuk melakukan format code
sebelum commit pastikan menjalankan perintah berikut

```bash
composer format
```

## Static analyse

Project ini menggunakan [Psalm](https://psalm.dev) untuk menjalankan dan memerika problem code yang ada, jalankan 
perintah berikut untuk menjalankan `psalm`

```bash
composer analyse
```
