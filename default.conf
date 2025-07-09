FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && pecl install redis \
    && docker-php-ext-enable redis

# Configure Nginx
COPY default.conf /etc/nginx/conf.d/default.conf

# Copy PHP script
COPY index.php /var/www/html/index.php

# Configure Supervisor to run both PHP-FPM and Nginx
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose port 80
EXPOSE 80

# Start Supervisor
CMD ["/usr/bin/supervisord"]
