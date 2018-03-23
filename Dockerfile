FROM wordpress:4.9.4-php5.6-apache

LABEL maintainer="devops@quintype.com"

ADD metype /var/www/html/wp-content/plugins/
