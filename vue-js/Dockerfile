FROM node:lts-alpine

RUN mkdir -p /app
WORKDIR /app

COPY package.json /app/
RUN npm install

CMD npm run dev