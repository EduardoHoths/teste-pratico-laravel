FROM php:8.2-cli

RUN apt-get update && apt-get install -y unzip curl git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir -p /var/www/html/storage/tmp && chown -R www-data:www-data /var/www/html/storage/tmp

COPY custom.ini /usr/local/etc/php/conf.d/custom.ini

WORKDIR /app

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
