# Use the latest Node.js LTS version as the base image
FROM node:latest

# Set the working directory inside the container
WORKDIR /app

# Copy package.json and package-lock.json to the working directory
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the rest of the application code to the working directory
COPY . .

# Build the Vue.js application
RUN npm run build

# Move built files to /var/www
RUN mkdir -p /var/www && cp -r dist/* /var/www

# This image will only be used to generate the build
