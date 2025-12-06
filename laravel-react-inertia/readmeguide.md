# Laravel 12 Project Guide (Inertia + React)

## Prerequisites
- Docker & Docker Compose V2
- Node.js & NPM (for local frontend build if not using Docker)

## Setup Instructions

### Windows (WSL2)
1. Open your WSL2 terminal (e.g., Ubuntu).
2. Clone the repository.
3. Run: `docker compose up -d`
4. Install PHP dependencies: 
   `docker compose exec app composer install`
5. Install Node dependencies: 
   `docker compose exec app npm install`
6. Setup env: 
   `docker compose exec app cp .env.example .env`
   `docker compose exec app php artisan key:generate`
7. Publish Vendors:
   `docker compose exec app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`
   `docker compose exec app php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
   `docker compose exec app php artisan vendor:publish --provider="Laravel\Passport\PassportServiceProvider"`
8. Migrate & Seed: 
   `docker compose exec app php artisan migrate --seed`
8. Build Assets: 
   `docker compose exec app npm run dev`

### Linux / macOS
1. Open terminal.
2. Run: `docker compose up -d`
3. `docker compose exec app composer install`
4. `docker compose exec app npm install`
5. `docker compose exec app cp .env.example .env`
6. `docker compose exec app php artisan key:generate`
7. `docker compose exec app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`
8. `docker compose exec app php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"`
9. `docker compose exec app php artisan vendor:publish --provider="Laravel\Passport\PassportServiceProvider"`
10. `docker compose exec app php artisan migrate --seed`
11. `docker compose exec app npm run dev`
12. `docker compose exec --user root app bash` - this is for permission Issues
    a. `chown -R www-data:www-data storage bootstrap/cache`
    b. `chmod -R 775 storage bootstrap/cache`
## Troubleshooting
- **Missing Classes Error**: Run `docker compose exec app composer dump-autoload -o`.
- **Permission Issues**: `sudo chown -R $USER:www-data storage bootstrap/cache` and `chmod -R 775 storage bootstrap/cache`.
- **Passport Keys**: If Passport fails, run `docker compose exec app php artisan passport:install`.
- **Vite Connection Refused**: Ensure port `5173` is exposed in `docker-compose.yml` and `vite.config.js` has `server: { host: '0.0.0.0', hmr: { host: 'localhost' } }`.

## Features Configured
- **Inertia + React**: React 18 frontend in `resources/js`.
- **Authentication**: Setup with Sanctum/Passport support. Jetstream available via `php artisan jetstream:install inertia`.
- **Permissions**: Spatie RBAC configured (Roles: Super Admin, Admin, Manager, User).
- **Cashier**: Stripe subscription support prepared.
- **Docker**: Full MySQL + Redis stack.