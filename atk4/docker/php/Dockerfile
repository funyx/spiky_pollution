FROM php:8.2-rc-apache-buster

ENV APACHE_DOCUMENT_ROOT /var/www/html/htdocs

WORKDIR /var/www/html

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN docker-php-ext-install \
    mysqli \
    pdo_mysql

# add Composer
COPY --from=composer /usr/bin/composer /usr/local/bin/composer

COPY ./ ./
