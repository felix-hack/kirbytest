# Use an official PHP-Apache base image
FROM php:8.1-apache

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Configure and install the GD extension with JPEG and WebP support, etc.
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd mbstring opcache

# Enable Apache mod_rewrite for Kirby’s routing
RUN a2enmod rewrite

# Copy project files to Apache's document root
COPY . /var/www/html/

# Make sure Apache can access and write necessary files
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Render uses PORT environment variable, but exposing 80 is fine)
EXPOSE 80

# Run Apache in the foreground
CMD ["apache2-foreground"]
