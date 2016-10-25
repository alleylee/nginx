FROM nginx

# Remove the default configuration file

RUN rm -v /etc/nginx/nginx.conf

# Copy a configuration file from the current directory

ADD nginx.conf /etc/nginx/

COPY ./app/ /var/www/

# Append "daemon off;" to the beginning of the configuration

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Expose ports

EXPOSE 80

CMD service nginx start
