FROM php:8.3-fpm AS base

ENV TZ=Europe/Minsk

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip pdo exif bcmath

RUN pecl install redis && docker-php-ext-enable redis

# Postgres
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

########################################################################################################################
FROM base as laravel-app

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug-3.3.2
ENV PHP_IDE_CONFIG 'serverName=abw-ms-auth'
RUN echo "xdebug.mode=debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN touch /var/log/xdebug.log
RUN chown www-data:www-data /var/log/xdebug.log && chmod 777 /var/log/xdebug.log
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT=-1

#For tinker
RUN mkdir -p /var/www/.config/psysh
RUN chmod -R 755 /var/www/.config/psysh

# Create a group and user with specified UID and GID
RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data

RUN mkdir /var/www/.composer
# Set working directory
WORKDIR /var/www/html

# Give ownership of the working directory to the user
RUN chown -R www-data:www-data /var/www/.composer
RUN chown -R www-data:www-data /var/www/.config
RUN chown -R www-data:www-data /var/www/html

# Switch to non-root user (www-data)
USER www-data

# Expose port 80
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]
########################################################################################################################
FROM base as laravel-app-prod

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug-3.3.2
ENV PHP_IDE_CONFIG 'serverName=abw-ms-auth'
RUN echo "xdebug.mode=debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey = PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN touch /var/log/xdebug.log
RUN chown www-data:www-data /var/log/xdebug.log && chmod 777 /var/log/xdebug.log
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT=-1

#For tinker
RUN mkdir -p /var/www/.config/psysh
RUN chmod -R 755 /var/www/.config/psysh

# Create a group and user with specified UID and GID
RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data

RUN mkdir /var/www/.composer
# Set working directory
WORKDIR /var/www/html

# Give ownership of the working directory to the user
RUN chown -R www-data:www-data /var/www/.composer
RUN chown -R www-data:www-data /var/www/.config
RUN chown -R www-data:www-data /var/www/html

# Switch to non-root user (www-data)
USER www-data

# Expose port 80
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]

########################################################################################################################
FROM base as cron

#Crontab
RUN apt-get update && apt-get install -y cron
COPY crontab/scheduled /etc/cron.d/scheduled/scheduled
ADD crontab /etc/cron.d/scheduled
RUN chmod 0644 /etc/cron.d/scheduled/scheduled
RUN crontab /etc/cron.d/scheduled/scheduled
RUN touch /var/log/cron.log
#
#RUN usermod -u 1000 www-data && \
#    groupmod -g 1000 www-data
#
#USER www-data

CMD cron && tail -f /var/log/cron.log

########################################################################################################################
FROM base AS supervisor

RUN apt-get update && apt-get install -y supervisor
RUN mkdir -p /var/www/html/storage/logs/supervisor
RUN mkdir -p /var/log/supervisor && chown -R www-data:www-data /var/log/supervisor
COPY ./supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data

USER www-data

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
