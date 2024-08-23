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

# Remove existing .env file
RUN [ -f .env ] && rm .env || true

# Declare the build argument
ARG VITE_API_DOMAIN

# Create the .env file with the VITE_API_DOMAIN variable
RUN echo "VITE_API_DOMAIN=${VITE_API_DOMAIN}" > .env

# Expose the port the app runs on
EXPOSE 5173

# Command to run the application in development mode
CMD ["npm", "run", "dev"]
