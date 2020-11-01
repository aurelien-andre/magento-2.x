FROM debian:buster-slim

ENV \
USER_ID='1000' \
USER_GROUP='1000' \
MAGE_MODE='developer' \
MAGE_RUN_CODE='base' \
MAGE_RUN_TYPE='website' \
MYSQL_HOST='mysql' \
MYSQL_PORT='3306' \
MYSQL_USER='www-data' \
MYSQL_PASSWORD='www-password' \
MYSQL_DATABASE='magento' \
REDIS_SESSION_HOST='redis-session' \
REDIS_SESSION_PORT='6379' \
REDIS_CACHE_HOST='redis-cache' \
REDIS_CACHE_PORT='6379'

RUN apt-get update \
&&  apt-get install -y --no-install-recommends \
software-properties-common \
apt-transport-https \
lsb-release \
ca-certificates \
gnupg \
gnupg1 \
gnupg2 \
ssl-cert \
git \
wget \
curl \
acl \
unzip

RUN rm -rf /etc/apt/sources.list.d/*

RUN apt-get update \
&&  curl -sL https://deb.nodesource.com/setup_12.x | bash - \
&&  wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add - \
&&  echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

RUN apt-get update \
&&  DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
nodejs \
apache2 \
libapache2-mod-php7.4 \
php7.4 \
php7.4-cli \
php7.4-common \
php7.4-bcmath \
php7.4-opcache \
php7.4-curl \
php7.4-mbstring \
php7.4-mysql \
php7.4-xml \
php7.4-xsl \
php7.4-gd \
php7.4-intl \
php7.4-iconv \
php7.4-soap \
php7.4-ftp \
php7.4-zip

COPY docker /

RUN a2dissite default-ssl.conf \
&&  a2dismod ssl \
&&  a2enmod rewrite \
&&  a2enmod headers

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN chmod +x -R /usr/bin

RUN perms-writer \
'/var/www/html'

RUN process-writer \
'perms-loader' \
'apache2-foreground'

COPY --chown=www-data:www-data . /var/www/html

EXPOSE 8080

WORKDIR /var/www/html

CMD ["process-loader"]
