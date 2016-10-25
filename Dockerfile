FROM nginx

# Remove the default configuration file

RUN rm -v /etc/nginx/nginx.conf

RUN sudo tee /etc/nginx/conf.d/php.conf << EOF upstream php { server unix:/var/run/php5-fpm.sock; } EOF

# Copy a configuration file from the current directory

ADD nginx.conf /etc/nginx/

COPY ./app/ /var/www/

# Append "daemon off;" to the beginning of the configuration

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Expose ports

EXPOSE 80

CMD service nginx start
