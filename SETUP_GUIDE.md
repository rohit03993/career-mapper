# Career Mapper Website - Setup Guide

## ✅ What's Been Completed

1. **Laravel Project Setup** - Laravel 12 installed and configured
2. **MySQL Configuration** - Database config updated (you need to set up .env)
3. **Routes & Controllers** - HomeController and ContactController created
4. **Blade Templates** - Complete website structure with all sections:
   - Header with navigation
   - Hero section
   - About Us
   - Why Choose Us
   - Clients/Partners
   - Features
   - Services
   - Portfolio
   - Testimonials
   - Team
   - Contact Form
   - Footer
5. **Asset Directory Structure** - All folders created

## 📋 Next Steps

### 1. Set Up .env File
Run this command to generate .env and APP_KEY:
```bash
php artisan key:generate
```

Then update your `.env` file with MySQL credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=career_mapper
DB_USERNAME=root
DB_PASSWORD=your_password_here
```

### 2. Download Required Assets

You need to download the following assets from the original website (https://careermapper.in):

#### Vendor Libraries (Download from CDN or official sources):
- **Bootstrap 5** - https://getbootstrap.com/
- **Bootstrap Icons** - https://icons.getbootstrap.com/
- **Boxicons** - https://boxicons.com/
- **Remixicon** - https://remixicon.com/
- **AOS (Animate On Scroll)** - https://michalsnik.github.io/aos/
- **Swiper** - https://swiperjs.com/
- **GLightbox** - https://biati-digital.github.io/glightbox/
- **Isotope** - https://isotope.metafizzy.co/
- **PureCounter** - https://github.com/srexi/purecounterjs

#### Images (Download from original site):
- Logo: `assets/img/logo/logo-white-removebg-preview.png`
- Hero background: `assets/img/hero-bg.jpg`
- About image: `assets/img/about.jpg`
- Features images: `assets/img/features.jpg`, `assets/img/features_2.jpg`
- Why Us image: `assets/img/why-us.jpg`
- Client logos: `assets/img/clients/client-1.png` through `client-8.png`
- Portfolio images: `assets/img/portfolio/portfolio-1.jpeg` through `portfolio-5.jpeg`
- Testimonial images: `assets/img/testimonials/testimonials-1.jpg` through `testimonials-4.jpeg`
- Team images: All team member photos from `assets/img/team/`

#### CSS/JS Files:
- Main CSS: `assets/css/style.css` (you can copy from original site or I'll create a basic one)
- Main JS: `assets/js/main.js` (you can copy from original site or I'll create a basic one)
- PHP Email Form: `assets/vendor/php-email-form/validate.js`

### 3. Install NPM Dependencies (Optional - for Vite)
```bash
npm install
```

### 4. Create MySQL Database
```sql
CREATE DATABASE career_mapper;
```

### 5. Run Migrations (if needed later)
```bash
php artisan migrate
```

## 🎨 Design Notes

The website uses:
- **Color Scheme**: Dark grey background (#212529), Red accents (#dc3545), Orange highlights (#ff6b35)
- **Fonts**: Poppins, Raleway, Open Sans (from Google Fonts)
- **Layout**: Bootstrap 5 grid system
- **Animations**: AOS for scroll animations
- **Sliders**: Swiper for testimonials
- **Lightbox**: GLightbox for portfolio images
- **Filtering**: Isotope for portfolio filtering

## 🚀 Running the Application

Once assets are in place:
```bash
php artisan serve
```

Then visit: http://localhost:8000

## 📝 Contact Form

The contact form is set up and ready. You'll need to configure email settings in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@careermapper.in
MAIL_FROM_NAME="Career Mapper"
```

## 🔧 Customization

All templates are in:
- `resources/views/layouts/app.blade.php` - Main layout
- `resources/views/home.blade.php` - Home page
- `resources/views/partials/header.blade.php` - Header
- `resources/views/partials/footer.blade.php` - Footer

Controllers:
- `app/Http/Controllers/HomeController.php`
- `app/Http/Controllers/ContactController.php`

