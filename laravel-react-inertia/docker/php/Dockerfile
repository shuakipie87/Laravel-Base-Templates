FROM php:8.2-fpm

# Arguments
ARG user=www-data
ARG uid=1000
ARG gid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    default-mysql-client \
    nodejs \
    npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Adjust www-data UID/GID and setup home directory
RUN groupmod -g $gid $user \
    && usermod -u $uid -g $gid $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

# Switch to non-root user
USER $user

# Expose PHP-FPM port
EXPOSE 9000

# Default command
CMD ["php-fpm"]