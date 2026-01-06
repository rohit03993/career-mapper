#!/bin/bash
# Quick Deployment Script for careermapper.in

# Colors for output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

echo -e "${GREEN}Starting deployment for careermapper.in...${NC}"

# Navigate to project directory
cd /home/careermapper/htdocs || {
    echo -e "${RED}Error: Directory /home/careermapper/htdocs not found!${NC}"
    exit 1
}

# Pull latest changes
echo -e "${YELLOW}Pulling latest changes from Git...${NC}"
git pull origin main

# Install dependencies
echo -e "${YELLOW}Installing Composer dependencies...${NC}"
composer install --no-dev --optimize-autoloader

# Run migrations
echo -e "${YELLOW}Running database migrations...${NC}"
php artisan migrate --force

# Create storage symlink
echo -e "${YELLOW}Creating storage symlink...${NC}"
php artisan storage:link

# Clear and cache config
echo -e "${YELLOW}Optimizing application...${NC}"
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Fix permissions
echo -e "${YELLOW}Fixing permissions...${NC}"
chmod -R 775 storage bootstrap/cache
chown -R careermapper:www-data storage bootstrap/cache

echo -e "${GREEN}Deployment complete!${NC}"
echo -e "${GREEN}Visit: https://careermapper.in${NC}"

