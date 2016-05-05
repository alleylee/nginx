FROM nginx

# Remove the default Nginx configuration file

RUN rm -v /etc/nginx/nginx.conf
RUN rm -rf /etc/nginx/conf.d

# Copy a configuration file from the current directory

ADD nginx.conf /etc/nginx/
ADD ./conf.d /etc/nginx/conf.d

# Append "daemon off;" to the beginning of the configuration

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Expose ports

EXPOSE 80

CMD service nginx start
