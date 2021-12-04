# Для начала указываем исходный образ, он будет использован как основа
FROM php:7.4-apache
MAINTAINER Daria Peregudova <dashapereg@mai.ru>
# RUN выполняет идущую за ней команду в контексте нашего образа.
# В данном случае мы установим некоторые зависимости и модули PHP.
# Для установки модулей используем команду docker-php-ext-install.
# На каждый RUN создается новый слой в образе, поэтому рекомендуется объединять команды.
RUN apt-get update && apt-get install -y libaprutil1-dbd-mysql libxml2-dev p7zip unzip \
        curl \
        wget \
        git \
        apt-utils \
        bash \
        vim \
    && docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer \
    && a2enmod rewrite \
    && composer self-update

#RUN cd /var/www/html && composer create-project --prefer-dist laravel/laravel multinote

#ADD conf/php.ini-mail /usr/local/etc/php/php.ini
# Добавим свой php.ini, можем в нем определять свои значения конфига
#ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

