# Gunakan image PHP resmi versi 8.5 dengan Apache
FROM php:8.5-apache

# Instal ekstensi yang dibutuhkan (PDO PostgreSQL)
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Salin semua file proyek ke dalam direktori web server
COPY . /var/www/html/

# Atur direktori kerja
WORKDIR /var/www/html/

# Ekspos port 80 (port default Apache)
EXPOSE 3000