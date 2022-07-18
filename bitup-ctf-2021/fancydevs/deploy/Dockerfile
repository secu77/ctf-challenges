FROM php:7.0-apache

RUN apt-get update && \
    apt-get install -y redis-server supervisor

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN mkdir -p /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY src /var/www/html

RUN chmod 777 /var/www/html/uploads

EXPOSE 80
CMD ["/usr/bin/supervisord"]
