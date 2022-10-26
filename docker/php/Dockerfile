FROM php:8.1.9-fpm
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
zlib1g-dev \
libzip-dev \
vim \
&& docker-php-ext-install zip pdo_mysql opcache

ENV NODE_VERSION=16.14.0
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.34.0/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN node --version
RUN npm --version

WORKDIR /var/www/src
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require "laravel/installer"
ADD . /var/www/src/storage
RUN chown -R www-data:www-data /var/www/src/storage