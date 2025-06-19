FROM php:8.2-fpm

# Instalar extensões do sistema necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_pgsql

# Instalar o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir diretório padrão de trabalho
WORKDIR /var/www
