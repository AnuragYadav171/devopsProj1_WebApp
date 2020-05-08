FROM php:7.3-apache

WORKDIR /var/www/html

COPY . /var/www/html

# RUN yum update

# RUN yum install -y mysql

# RUN echo "ServerName localhost"  >> /etc/httpd/conf/httpd.conf

RUN docker-php-ext-install mysqli

RUN docker-php-ext-enable mysqli

# RUN chmod +x script.sh

RUN mkdir uploads

# RUN chown -R apache uploads

RUN chmod -R 777 uploads

EXPOSE 80

#CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]

# CMD ["./script.sh"]