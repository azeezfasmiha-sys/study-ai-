FROM php:8.2-apache

# Install required system dependencies (Tesseract OCR, Poppler, cURL)
RUN apt-get update && apt-get install -y \
    tesseract-ocr \
    tesseract-ocr-tam \
    tesseract-ocr-sin \
    tesseract-ocr-eng \
    poppler-utils \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libcurl4-openssl-dev \
    && docker-php-ext-install mysqli curl gd

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

# Set appropriate permissions for uploads
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads && \
    chmod -R 775 /var/www/html/uploads

EXPOSE 80
CMD ["apache2-foreground"]
