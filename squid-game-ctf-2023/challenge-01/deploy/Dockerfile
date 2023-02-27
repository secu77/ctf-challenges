FROM ubuntu:20.04

# Stolen from https://github.com/Adepts-Of-0xCC/CHALLENGE-01/
ENV TZ=Europe/Madrid
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

EXPOSE 80/tcp

RUN apt update && apt upgrade -y
RUN apt install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt update && apt install -y apache2 php8.0 libapache2-mod-php8.0 supervisor gcc openssh-server sudo
RUN mkdir -p /var/log/supervisor
RUN a2dismod --force autoindex

COPY conf/daemon.sh /root/daemon.sh
COPY conf/entrypoint.sh /entrypoint.sh
COPY conf/flag /root/squid-flag
COPY conf/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY conf/envvars /etc/apache2/envvars
COPY conf/php.ini /etc/php/8.0/apache2/php.ini

# Copy web files
COPY www/index.php /var/www/html/index.php
COPY www/upload.php /var/www/html/upload.php
COPY www/robots.txt /var/www/html/robots.txt
COPY www/images /var/www/html/images

# Copy squid-control
COPY squid-control /opt/squid-control

# Create SSH things
RUN echo "ListenAddress 127.0.0.1" >> /etc/ssh/sshd_config
RUN mkdir -p /root/.ssh
RUN service ssh start

# Compile LD_PRELOAD lib to hook shell execution
COPY conf/hook.c /root/hook.c
RUN gcc -Wall -O2 -fpic -shared -o /usr/local/lib/falcon.so /root/hook.c -ldl
RUN rm /root/hook.c

RUN ["chmod", "700", "/root/daemon.sh"]
RUN ["chmod", "700", "/entrypoint.sh"]
RUN ["chmod", "400", "/root/squid-flag"]
RUN ["chmod", "774", "/usr/local/lib/falcon.so"]

RUN ["mkdir", "/var/www/html/files"]
RUN ["chown", "-R", "www-data:www-data", "/var/www/html/files"]
RUN ["rm", "/var/www/html/index.html"]

CMD ["/usr/bin/supervisord"]
