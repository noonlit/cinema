FROM php:7-fpm
RUN \
    apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev
RUN docker-php-ext-install -j$(nproc) iconv mcrypt bcmath gd pdo_mysql zip
RUN usermod -u 1000 www-data
RUN usermod -G staff www-data
RUN mkdir -p /var/www/code/var/cache
RUN mkdir -p /var/www/code/var/logs
RUN chown -R www-data.www-data /var/www/code/var/cache
RUN chown -R www-data.www-data /var/www/code/var/logs
RUN mkdir /var/www/.composer
RUN chmod 777 -R /var/www/.composer
# install xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=\"PHPSTORM\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo 'alias sf3="php bin/console"' >> ~/.bashrc
RUN echo 'alias sf3="php bin/console"' >> /var/www/.bashrc
WORKDIR /var/www/code