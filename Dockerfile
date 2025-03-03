FROM php:8.2-cli

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias con Composer
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto (para usar el servidor PHP embebido)
EXPOSE 8000

# Comando por defecto para iniciar el servidor web PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
