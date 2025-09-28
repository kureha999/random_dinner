ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-fpm

# システムの依存関係をインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    zip \
    unzip \
    nodejs \
    npm \
    vim \
    htop \
    procps \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# PHP拡張機能をインストール
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Redis拡張機能をインストール
RUN pecl install redis \
    && docker-php-ext-enable redis

# XDebug（開発用）をインストール
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# PHP設定ファイルをコピー
COPY docker/app/php.ini /usr/local/etc/php/conf.d/custom.ini

# 適切な権限を設定
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# PHP-FPMを起動
CMD ["php-fpm"]
