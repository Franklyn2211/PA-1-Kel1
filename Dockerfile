FROM php:8.1-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        libonig-dev \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        zip \
    && rm -rf /var/lib/apt/lists/*

# Naikkan memory limit untuk composer
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Buat .env dari .env.example agar composer scripts tidak error
RUN cp .env.example .env 2>/dev/null || touch .env

# Tambah --no-scripts dan --no-plugins untuk skip artisan calls saat build
RUN composer install --no-interaction --prefer-dist --no-scripts --no-plugins

# Generate key setelah install
RUN php artisan key:generate --force 2>/dev/null || true

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
