FROM php:8.1-fpm
USER root

# Set working directory
WORKDIR /var/www/app

# Install dependencies
RUN apt-get update && apt-get install -y \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  libzip-dev \
  libonig-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  unzip \
  git \
  curl

# php curl
RUN apt-get install -y libcurl4-gnutls-dev
RUN docker-php-ext-install curl

# php gmp
RUN apt-get install -y libgmp-dev
RUN docker-php-ext-install gmp

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql
#RUN docker-php-ext-install mbstring json
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd

# NodeJs & Npm
#RUN curl -sL https://deb.nodesource.com/setup_16.x | sudo bash -
#RUN apt-get -y install nodejs

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for application
#RUN groupadd -g 1000 www-data
#RUN useradd -u 1000 -ms /bin/bash -g www-data www-data

# Copy existing application directory contents
COPY . /var/www/app

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/app

# Change current user to www
#USER www-data
USER root

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
