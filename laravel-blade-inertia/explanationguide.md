# Architectural Explanation

## 1. Stack Choices
- **Laravel 12**: Latest framework features (Pest testing, new middleware handling).
- **Blade + Alpine**: Lightweight complexity. Blade handles routing/layout, Alpine handles simple client-side state (modals, counters) without the overhead of React/Vue.
- **Docker**: Full environment isolation. Services include Nginx (web server), PHP-FPM (app), MySQL (db), Redis (cache/queue).

## 2. Security & RBAC
- **Spatie Permission**: Implements Role-Based Access Control.
- **Roles**: User, Manager, Admin, Super Admin.
- **Hierarchy**: Defined in `RolesAndPermissionsSeeder.php`.
- **Super Admin**: A `Gate::before` intercept in `AppServiceProvider` grants all permissions to the Super Admin role automatically, preventing lockout.

## 3. Performance
- **Redis**: Configured as the default driver for Cache, Queue, and Sessions. This ensures the app is stateless and scalable across multiple containers.
- **Opcache**: Enabled by default in the PHP Docker image for production readiness.

## 4. Payment Integration
- **Laravel Cashier (Stripe)**: Pre-installed. The User model uses the `Billable` trait. 
- **Config**: Add your Stripe keys to `.env`.

## 5. Feature Flags
- **Laravel Pennant**: Installed for feature toggling. A sample feature `beta-features` is defined in `AppServiceProvider`.