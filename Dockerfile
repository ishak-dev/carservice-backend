# Use an official PHP runtime as the base image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application code to the working directory
COPY . /var/www/html

# Install PHP dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite

# Expose the port the application will run on
EXPOSE 80

# Start the Apache web server
CMD ["apache2-foreground"]