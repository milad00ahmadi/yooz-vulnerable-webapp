FROM nginx:1.19.5-alpine

COPY ./backend /var/www/html

COPY ./nginx/nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80