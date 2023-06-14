# Use an official PHP runtime as the base image
FROM php:8.0-apache

# Set the working directory inside the container
WORKDIR /

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libmcrypt-dev \
    libxml2-dev \
    zlib1g-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install \
    mysqli \
    pdo_mysql \
    xml

# Enable Apache modules
RUN a2enmod rewrite

# Copy the application code into the container
COPY . /


# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
