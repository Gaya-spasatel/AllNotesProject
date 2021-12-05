# Для начала указываем исходный образ, он будет использован как основа
FROM php:8.1-apache
MAINTAINER Daria Peregudova <dashapereg@mai.ru>
# RUN выполняет идущую за ней команду в контексте нашего образа.
# В данном случае мы установим некоторые зависимости и модули PHP.
# Для установки модулей используем команду docker-php-ext-install.
# На каждый RUN создается новый слой в образе, поэтому рекомендуется объединять команды.
RUN apt-get update &&  \
    apt-get install -y --no-install-recommends \
      libaprutil1-dbd-mysql  \
      libxml2-dev  \
      p7zip  \
      unzip \
      curl \
      wget \
      git \
      apt-utils \
      bash \
      vim \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
      libwebp-dev \
      zlib1g-dev \
      zlib1g-dev \
      libzip-dev \
      zip

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && docker-php-ext-configure zip

RUN docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql zip gd \
    && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer \
    && a2enmod rewrite \
    && composer self-update

#RUN cd /var/www/html && composer create-project --prefer-dist yiisoft/yii2-app-basic multinote
#RUN cd /var/www/html && composer create-project --prefer-dist yiisoft/yii2-app-advanced multinote
#RUN cd /var/www/html && composer create-project --prefer-dist laravel/laravel multinote

RUN apt-get clean

#ADD conf/php.ini-mail /usr/local/etc/php/php.ini
# Добавим свой php.ini, можем в нем определять свои значения конфига
#ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

