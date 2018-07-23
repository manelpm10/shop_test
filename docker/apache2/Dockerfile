FROM debian:8.3

WORKDIR /var/www

ENV DEBIAN_FRONTEND noninteractive

# Update the package repository
RUN apt-get clean && apt-get update

RUN apt-get install -y wget curl git vim

# PHP 7.1 sources
RUN apt-get install -y apt-transport-https lsb-release ca-certificates
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list

# Install Apache and PHP
RUN apt-get update && apt-get install -y \
    apache2 \
    libapache2-mod-php7.1 \
    php7.1 \
    php7.1-cli \
    php7.1-common \
    php7.1-mysql \
    php7.1-curl \
    php7.1-dom \
    php7.1-mbstring \
    php7.1-xml \
    zip \
    unzip

# Setup Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN a2enmod php7.1 rewrite ssl
RUN usermod -u 1000 www-data

ADD templates/default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
