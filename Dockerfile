FROM php:8.3-fpm

RUN apt update && apt install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libcurl4-openssl-dev \
        libgmp-dev \
        libonig-dev \
        libzip-dev \
        openssl \
        libssl-dev \
        libxml2-dev

RUN pecl install --force redis

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql bcmath zip gmp mbstring xml exif gd zip

RUN docker-php-ext-enable pdo pdo_mysql bcmath zip gmp redis mbstring xml exif gd zip

RUN echo "allow_url_fopen=On" >> /usr/local/etc/php/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY composer.json composer.lock ./
RUN composer update --no-scripts --no-autoloader
COPY . .
# RUN composer dump-autoload --optimize

CMD ["php-fpm"]
