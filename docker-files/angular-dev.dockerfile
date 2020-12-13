FROM node:latest

WORKDIR /var/www/html/

COPY ./frontend/package*.json ./

RUN npm install -g @angular/cli

RUN ng config --global cli.packageManager yarn

RUN yarn install


COPY ./frontend ./

EXPOSE 4200

CMD ["yarn", "start"]