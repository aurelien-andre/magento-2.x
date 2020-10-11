FROM debian:buster-slim

ENV APACHE_PID_FILE='/var/run/apache2/apache2.pid' \
    APACHE_RUN_DIR='/var/run/apache2' \
    APACHE_LOCK_DIR='/var/lock/apache2' \
    APACHE_LOG_DIR='/var/log/apache2' \
    APACHE_ROOT_DIR='/var/www/html' \
    APACHE_RUN_USER='www-data' \
    APACHE_RUN_GROUP='www-data' \
    LANG='C' \
    USER_ID='1000' \
    USER_GROUP='1000' \
    K8S_NAMESPACE='local' \
    K8S_NODE='local' \
    K8S_POD='magento' \
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
    REDIS_CACHE_PORT='6379' \
    SMTP_HOST='mailhog' \
    SMTP_PORT='1025' \
    ELASTICSEARCH_HOST='elasticsearch' \
    ELASTICSEARCH_PORT='9200' \
    ELASTICSEARCH_PREFIX='bureauvalle' \
    ELASTICSEARCH_ENABLE_AUTH='0' \
    ELASTICSEARCH_USERNAME='www-data' \
    ELASTICSEARCH_PASSWORD='www-password' \
    RABBITMQ_USER='www-data' \
    RABBITMQ_PASSWORD='www-password'

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
&&  a2enmod rewrite \
&&  a2enmod headers

RUN rm -rf /var/www/html/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN chmod +x -R /usr/bin

RUN chmod 644 /etc/cron.d/magento

COPY --chown=www-data:www-data . /var/www/html

EXPOSE 80

WORKDIR /var/www/html

CMD ["apache2-foreground"]