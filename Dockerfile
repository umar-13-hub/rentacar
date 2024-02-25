FROM 8.2-fpm-alpine3.18

RUN apk update && apk add php82-pdo_pgsql autoconf g++ make git zip postgresql-dev postgresql-client
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo_pgsl opcache bcmath

COPY ./.docker/php/php.ini /usr/local/etc/php
RUN curl -s https://getcomposer.org/installer | php
RUN alias composer='php composer.phar'

WORKDIR /app
COPY ./ .
CMD ["php-fpm"]
