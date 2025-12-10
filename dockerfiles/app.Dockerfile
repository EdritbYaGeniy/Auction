FROM php:8.4-fpm-alpine

# Install system dependencies and PHP extensions prerequisites
RUN apk update && apk add --no-cache \
    # Add 'linux-headers' here:
    linux-headers \
    postgresql-client \
    postgresql-dev \
    rabbitmq-c-dev \
    librdkafka-dev \
    build-base \
    autoconf \
    libxml2-dev \
    zip \
    unzip \
    git \
    $PHPIZE_DEPS

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pcntl bcmath sockets opcache \
    && pecl install amqp rdkafka \
    && docker-php-ext-enable amqp rdkafka

# ... rest of the Dockerfile remains the same ...
# Oчистка от временных файлов
RUN apk del build-base autoconf $PHPIZE_DEPS

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Установка рабочей директории
WORKDIR /var/www/html

# Копирование исходного кода приложения (пока пустая папка src на хосте)
COPY ./src /var/www/html
