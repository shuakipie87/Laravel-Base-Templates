# Production Deployment Checklist

## Server Requirements
- PHP 8.2+
- MySQL 8.0+
- Nginx
- Redis
- Composer
- Node.js (for building assets)

## Steps
1. **Clone & Env**:
   - Clone repository.
   - Copy `.env.example` to `.env`. Set `APP_ENV=production` and `APP_DEBUG=false`.
   - Configure real database credentials and Redis host.

2. **Install Dependencies**:
   bash
   composer install --optimize-autoloader --no-dev
   npm ci
   npm run build
   

3. **Database**:
   bash
   php artisan migrate --force
   # Optional: php artisan db:seed --force
   

4. **Optimization**:
   bash
   php artisan config:cache
   php artisan event:cache
   php artisan route:cache
   php artisan view:cache
   

5. **Permissions**:
   - Ensure `storage` and `bootstrap/cache` are writable by the web server user.

6. **Queue Worker**:
   - Set up Supervisor to run `php artisan queue:work --tries=3`.
