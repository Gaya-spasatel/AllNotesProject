# Для начала указываем исходный образ, он будет использован как основа
FROM php:8.0-apache
MAINTAINER Daria Peregudova <dashapereg@mail.ru>
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
      libcurl4 \
      wget \
      git \
      apt-utils \
      bash \
      vim \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
      libwebp-dev \
      libmemcached-dev \
      memcached \
      zlib1g-dev \
      zlib1g-dev \
      libzip-dev \
      libpng-tools \
      zip

# memcached
RUN pecl install memcached-3.1.5
RUN docker-php-ext-enable memcached

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && docker-php-ext-configure zip \
    && docker-php-ext-configure intl

RUN docker-php-ext-install -j$(nproc) opcache mysqli pdo pdo_mysql zip gd intl \
    # configure opcache \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache-recommended.ini \
    && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/opcache-recommended.ini \
    && echo "opcache.max_accelerated_files=4000" >> /usr/local/etc/php/conf.d/opcache-recommended.ini \
    && echo "opcache.revalidate_freq=2" >> /usr/local/etc/php/conf.d/opcache-recommended.ini \
    && echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/opcache-recommended.ini \
    && curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer \
    && wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony \
    && a2enmod rewrite \
    && composer self-update

RUN git config --global user.email "dashapereg@mail.ru" && \
    git config --global user.name "Daria Peregudova"

RUN cd /var/www/html && \
    composer create-project symfony/skeleton multinote

RUN cd /var/www/html/multinote && composer require --dev logger && \
    composer require --dev symfony/profiler-pack && \
    composer require --dev debug && \
    composer require annotations && \
    composer require --dev twig &&  \
    composer require --dev symfony/orm-pack &&  \
    composer require --dev symfony/maker-bundle

RUN cd /var/www/html/multinote && sed -i -E 's!# DATABASE_URL=\"mysql://db_user:db_password@127.0.0.1:3306/db_name\?serverVersion=5.7\"!DATABASE_URL=\"mysql://multinote:multinotepassword@db:3306/multinote\?serverVersion=5.7\"!g' .env \
    && sed -i -E 's!DATABASE_URL=\"postgresql!# DATABASE_URL=\"postgresql!g' .env

RUN apt-get clean


