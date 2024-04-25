# Use an official PHP image as the base image
FROM php:latest

# Set the working directory inside the container
WORKDIR /var/www/html

# Install any necessary dependencies (if needed)
# For example, if you need additional PHP extensions:
RUN docker-php-ext-install mysqli

# Copy the entire project directory into the container
COPY . .

# Expose the port your PHP server will run on (if applicable)
EXPOSE 80

# Command to run your PHP application (adjust as needed)
CMD [ "php", "-S", "0.0.0.0:80" ]
