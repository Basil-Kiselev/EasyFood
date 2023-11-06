FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zlib1g-dev \
    unzip \
    zip \
    supervisor


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NPM
#RUN curl https://www.npmjs.com/install.sh | sh




# Change current user to www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]