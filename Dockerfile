FROM php:8.3-fpm

# Install system dependencies
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

RUN docker-php-ext-install -j5 pdo_mysql bcmath zip gmp ctype json ctype mbstring openssl pdo tokenizer xml exif gd zip

RUN docker-php-ext-enable pdo_mysql bcmath zip gmp redis ctype json ctype mbstring openssl pdo tokenizer xml exif gd zip

# Allow URL fopen
RUN echo "allow_url_fopen=On" >> /usr/local/etc/php/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader
COPY . .
RUN composer dump-autoload --optimize

# Set the CMD to start php-fpm
CMD ["php-fpm"]
