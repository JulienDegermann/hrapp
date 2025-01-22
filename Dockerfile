FROM php:8.3-apache-bookworm

RUN apt-get update && apt-get install -y \
libpq-dev \
libicu-dev \
openssl \
nodejs \
npm \
curl \
git \
zip \
unzip \
&& rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install intl \
    && docker-php-ext-install intl pdo_pgsql
    
# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Laravel

RUN a2enmod rewrite



# COPY . /var/www/html

COPY ./docker.sh /var/opt/docker.sh

COPY ./apache.conf /etc/apache2/sites-available/000-default.conf


RUN chmod +x /var/opt/docker.sh
ENTRYPOINT ["/var/opt/docker.sh"]

WORKDIR /var/www/html


EXPOSE 80
