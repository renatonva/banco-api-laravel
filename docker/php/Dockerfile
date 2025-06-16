FROM php:8.2-fpm

# Instala extensões do sistema e do PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuração padrão
WORKDIR /var/www
