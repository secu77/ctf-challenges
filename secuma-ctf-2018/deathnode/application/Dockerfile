# specify the node base image with your desired version node:<version>
FROM node:8.11.2

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json AND package-lock.json are copied
# where available (npm@5+)
COPY package.json /usr/src/app

RUN npm install

# Bundle app source
COPY . /usr/src/app

CMD npm run dev

EXPOSE 8888
