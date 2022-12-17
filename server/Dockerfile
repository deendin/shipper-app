# Choose the OS as a base image
FROM php:8.1-fpm

# add metadata
LABEL version="1.0.0"

# install required dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-devlocales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    && apt-get clean && rm -rf /var/lib/lists/*

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# specify the directory where the source code must be copied
WORKDIR /var/www

# Copy from the host machine to image
COPY composer.json composer.lock ./

COPY . .

# Copy environment file
COPY ./.env.example ./.env

RUN composer install

RUN php artisan key:generate --ansi

RUN php artisan storage:link

COPY ./script/php_script.sh /tmp

RUN chmod +x /tmp/php_script.sh

ENTRYPOINT ["sh","/tmp/php_script.sh"]

# Choose the port to communicate with a container
EXPOSE 8000