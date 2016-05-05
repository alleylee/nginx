FROM daocloud.io/nginx

# Remove the default Nginx configuration file

RUN rm -v /etc/nginx/nginx.conf

# Copy a configuration file from the current directory

ADD nginx.conf /etc/nginx/

# Append "daemon off;" to the beginning of the configuration

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Expose ports

EXPOSE 80

CMD service nginx start
