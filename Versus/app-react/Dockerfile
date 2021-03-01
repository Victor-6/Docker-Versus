# pull official base image
FROM node:alpine

# set working directory
WORKDIR /app

# install app dependencies
COPY package.json .

RUN npm install

COPY . .

# start app
CMD ["npm", "start"]