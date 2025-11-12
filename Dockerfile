FROM php:8.2-cli

RUN apt-get update && apt-get install -y git libzip-dev
RUN docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --prefer-dist
RUN cp .env.example .env
RUN php artisan key:generate

CMD ["bash", "-c", "php artisan migrate --seed && make start"]
