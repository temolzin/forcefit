# Utiliza una imagen base de PHP con Apache
FROM php:7.4-apache

# Copia los archivos de tu proyecto al contenedor
COPY ./ /var/www/html/

# Habilita el módulo mod_rewrite de Apache
RUN a2enmod rewrite

# Instala cualquier extensión de PHP que puedas necesitar
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Instala las dependencias 
RUN apt-get update && apt-get install -y zlib1g-dev libjpeg-dev libfreetype6-dev
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev unzip
RUN apt-get install unzip

# Instala la extensión GD
RUN docker-php-ext-install gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

EXPOSE 80

# Inicia el servidor Apache
CMD ["apache2-foreground"]