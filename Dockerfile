FROM wordpress:latest

# Install Node.js and npm
RUN apt-get update && apt-get install -y nodejs npm

# Set working directory
WORKDIR /var/www/html/wp-content/themes/wp-starter-theme

# Copy package.json and package-lock.json (if available)
COPY ./package*.json ./

# Install dependencies
RUN npm install

# Copy the rest of the theme files
COPY ../ .

# Expose port 3000 for Vite
EXPOSE 3000