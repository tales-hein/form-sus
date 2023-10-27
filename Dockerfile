FROM php:7.4-apache

# install dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends openssl libssl-dev libcurl4-openssl-dev \
    iputils-ping bash-completion \
    zip unzip \
    nano \
    libmcrypt-dev \
    git \
    wget \
    && pecl install mongodb \
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* 
# RUN pecl install xdebug && docker-php-ext-enable xdebug \
#     & echo "\n\
#     xdebug.remote_host = 172.20.0.1 \n\
#     xdebug.default_enable = 1 \n\
#     xdebug.remote_autostart = 1 \n\
#     xdebug.remote_connect_back = 0 \n\
#     xdebug.remote_enable = 1 \n\
#     xdebug.remote_handler = "dbgp" \n\
#     xdebug.remote_port = 9000 \n\
#     xdebug.remote_log = /var/www/html/xdebug.log \n\
#     " >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd

RUN docker-php-ext-install exif

RUN mkdir -p /usr/local/etc/php/extra 
RUN wget -O /usr/local/etc/php/extra/full_php_browscap.ini https://tincoa.com.br/env/full_php_browscap.ini

# timezone
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# config php
RUN echo "upload_max_filesize = 20M" >> /usr/local/etc/php/conf.d/simoa-settings.ini
RUN echo "short_open_tag = On" >> /usr/local/etc/php/conf.d/simoa-settings.ini
RUN echo "date.timezone = America/Sao_Paulo" >> /usr/local/etc/php/conf.d/simoa-settings.ini
RUN echo "browscap = /usr/local/etc/php/extra/full_php_browscap.ini" >> /usr/local/etc/php/conf.d/simoa-settings.ini

# mod_rewrite and mod_headers (use for Access-Control-Allow-Origin)
RUN a2enmod rewrite headers

# update document root apache
#RUN sed -ri -e 's!/var/www/html!/var/www/simoa-app!g' /etc/apache2/sites-available/*.conf
#RUN sed -ri -e 's!/var/www/!/var/www!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# change www-data user to match the host system UID and GID and chown www directory
RUN usermod --uid 1000 www-data \
    && groupmod --gid 1000 www-data 
#  && chown -R www-data:www-data /var/www

# copy sites to apache
COPY ./.simoa/.apache/vhosts/*.conf /etc/apache2/sites-available/

# add sites
RUN cd /etc/apache2/sites-available \ 
    && a2ensite formsus.local.conf 

#set workdir
WORKDIR /var/www/formsus

# install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer