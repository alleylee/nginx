FROM nginx
FROM httpd:2.4

# Remove the default configuration file

RUN rm -v /etc/nginx/nginx.conf
RUN rm -v /etc/apache2/sites-available/000-default.conf

# Copy a configuration file from the current directory

ADD nginx.conf /etc/nginx/
ADD 000-default.conf /etc/apache2/sites-available/

COPY ./app/ /var/www/

# Append "daemon off;" to the beginning of the configuration

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Expose ports

EXPOSE 80

CMD service nginx start
CMD service apache2 start
