# Deployment Guide for careermapper.in
## Based on Your Current Development Setup

### Your Project Specifications:
- **Laravel Version**: 12.0
- **PHP Requirement**: 8.2 or 8.3
- **Frontend**: Vite + Tailwind CSS 4.0
- **Database**: MySQL (with migrations and seeders ready)

---

## Step 1: CloudPanel Site Creation

### In CloudPanel "New PHP Site" Form:

1. **Application**: Select **"Laravel 12"** (or latest Laravel available)
2. **Domain Name**: Enter `careermapper.in`
   - ⚠️ **Important**: If you want www, also add `www.careermapper.in` later
3. **PHP Version**: Select **PHP 8.2** or **8.3** (required for Laravel 12)
4. **Site User**: Change to `careermapper` (or keep default)
5. **Site User Password**: Save the generated password for SSH access
6. Click **"Create"**

---

## Step 2: SSH into Server

```bash
# SSH as root (then switch to site user)
ssh root@72.60.201.175

# OR directly as site user (if you have the password)
ssh careermapper@72.60.201.175
```

---

## Step 3: Navigate and Prepare Directory

```bash
# Navigate to site directory (adjust if different)
cd /home/careermapper/htdocs

# Check what CloudPanel created
ls -la

# If CloudPanel created default Laravel files, remove them
# (Keep only if you want to merge, but fresh clone is cleaner)
rm -rf app bootstrap config database public resources routes storage tests vendor .env .env.example
```

---

## Step 4: Clone Your Repository

```bash
# Make sure you're in the correct directory
cd /home/careermapper/htdocs

# Clone your repository
git clone https://github.com/rohit03993/career-mapper.git .

# Verify files are there
ls -la
```

---

## Step 5: Install Dependencies

```bash
# Install PHP dependencies (production mode)
composer install --no-dev --optimize-autoloader

# Install NPM dependencies
npm install

# Build frontend assets (Vite + Tailwind)
npm run build
```

---

## Step 6: Setup Environment File

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Edit .env file
nano .env
```

### Update `.env` with these values:

```env
APP_NAME="Career Mapper"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://careermapper.in

# Database (get from CloudPanel → Databases)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=careermapper_db
DB_USERNAME=careermapper_user
DB_PASSWORD=your_secure_password_from_cloudpanel

# Mail Configuration (Hostinger SMTP)
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=noreply@careermapper.in
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@careermapper.in
MAIL_FROM_NAME="${APP_NAME}"
```

**Save and exit**: `Ctrl+X`, then `Y`, then `Enter`

---

## Step 7: Create Database in CloudPanel

1. Go to **Sites** → **careermapper.in** → **Databases**
2. Click **"Add Database"**
3. Create:
   - Database name: `careermapper_db`
   - User: `careermapper_user`
   - Password: (generate strong password)
4. **Copy credentials** and update `.env` file
5. Grant all privileges to the user

---

## Step 8: Run Migrations and Seeders

```bash
# Run migrations
php artisan migrate --force

# Run all seeders (this will create admin user, default content, etc.)
php artisan db:seed --force
```

**Note**: Admin credentials will be created by `AdminUserSeeder.php`:
- Email: Check your `AdminUserSeeder.php` for the email
- Password: `admin123` (change after first login!)

---

## Step 9: Setup Storage and Permissions

```bash
# Create storage symlink
php artisan storage:link

# Fix permissions
chmod -R 775 storage bootstrap/cache
chown -R careermapper:www-data storage
chown -R careermapper:www-data bootstrap/cache
chown -R careermapper:careermapper .
```

---

## Step 10: Configure Document Root in CloudPanel

1. Go to **Sites** → **careermapper.in** → **Vhost**
2. Set **Document Root** to: `/home/careermapper/htdocs/public`
3. Click **Save**

---

## Step 11: Setup SSL Certificate

1. Go to **Sites** → **careermapper.in** → **SSL/TLS**
2. Click **"Let's Encrypt"**
3. Select domain: `careermapper.in`
4. Click **"Issue Certificate"**
5. Wait for certificate to be issued (usually 1-2 minutes)

---

## Step 12: Optimize Application

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
php artisan optimize
```

---

## Step 13: Verify Deployment

### Test these URLs:

1. **Homepage**: `https://careermapper.in`
2. **Admin Login**: `https://careermapper.in/admin/login`
   - Login with credentials from `AdminUserSeeder.php`
3. **Test Pages**: `https://careermapper.in/tests`
4. **Check images load correctly**

---

## Step 14: Setup Cron Job (Optional but Recommended)

In CloudPanel:
1. Go to **Sites** → **careermapper.in** → **Cron Jobs**
2. Click **"Add Cron Job"**
3. Add:
   ```
   * * * * * cd /home/careermapper/htdocs && php artisan schedule:run >> /dev/null 2>&1
   ```
4. Save

---

## Quick Deployment Script

Save this as `deploy.sh` in your project root:

```bash
#!/bin/bash
cd /home/careermapper/htdocs
git pull origin main
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
chmod -R 775 storage bootstrap/cache
chown -R careermapper:www-data storage bootstrap/cache
echo "✅ Deployment complete!"
```

Make it executable and run:
```bash
chmod +x deploy.sh
./deploy.sh
```

---

## Troubleshooting

### If images don't show:
```bash
php artisan storage:link
chmod -R 775 storage
chown -R careermapper:www-data storage
```

### If you get 500 errors:
```bash
# Check logs
tail -f storage/logs/laravel.log

# Clear all caches
php artisan optimize:clear
```

### If Vite assets don't load:
```bash
# Rebuild assets
npm run build

# Check public/build directory exists
ls -la public/build
```

### If database connection fails:
- Verify credentials in `.env` match CloudPanel database
- Check database user has proper permissions
- Ensure database exists in CloudPanel

---

## Post-Deployment Checklist

- [ ] Site loads at `https://careermapper.in`
- [ ] Admin panel accessible at `/admin/login`
- [ ] Can login with admin credentials
- [ ] Images display correctly
- [ ] All pages load without errors
- [ ] Contact form works (test email sending)
- [ ] Test booking form works
- [ ] SSL certificate is active (green padlock)
- [ ] Storage symlink exists (`ls -la public/storage`)

---

## Next Steps After Deployment

1. **Change admin password** immediately after first login
2. **Update content** through admin panel
3. **Upload real images** to replace placeholder images
4. **Configure email** settings for contact form
5. **Test all functionality** thoroughly
6. **Setup backups** in CloudPanel

---

## Important Notes

- **PHP Version**: Must be 8.2 or 8.3 for Laravel 12
- **Document Root**: Must point to `/public` directory
- **Storage**: Needs write permissions for `www-data` user
- **Assets**: Run `npm run build` after every deployment if you change frontend code
- **Environment**: Keep `APP_DEBUG=false` in production

