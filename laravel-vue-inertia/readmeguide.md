# Laravel 12 + Inertia + Vue Project

## Prerequisites

- Docker Desktop (Windows/Mac) or Docker Engine (Linux)
- Docker Compose V2
- Git

## Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/your-repo-name.git
cd your-repo-name
```

### 2. Environment Setup

Copy the example environment file:

```bash
cp .env.example .env
```

### 3. Start with Docker

Build and start the containers using Docker Compose:

```bash
docker compose up -d --build
```

### 4. Install Dependencies

Install PHP and Node.js dependencies inside the container:

```bash
# Install PHP dependencies
docker compose exec app composer install

# Install Node.js dependencies
docker compose exec app npm install
```

### 5. Application Setup

Generate the application key and setup the database:

```bash
# Generate App Key
docker compose exec app php artisan key:generate

# Run Migrations and Seeds
docker compose exec app php artisan migrate --seed
```

### 6. Build Frontend

Build the frontend assets:

```bash
docker compose exec app npm run dev
```

*Note: You can keep `npm run dev` running in a separate terminal for hot-reloading if you prefer, usually via `docker compose exec app npm run dev` or by installing node locally.*

### 7. Access the Application

- **Web App**: [http://localhost](http://localhost)
- **Mailpit**: [http://localhost:8025](http://localhost:8025)


## Post-Installation

1. Run `docker compose exec app php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"` to publish permission migrations.
2. Run `docker compose exec app php artisan migrate` again if permissions tables were missing.
3. Access Mailpit at [http://localhost:8025](http://localhost:8025)

## Architecture

- **Inertia + Vue 3**: Single Page Application feel with server-side routing.
- **Spatie Permissions**: Hierarchical RBAC implemented in `RolesAndPermissionsSeeder`.
- **Sanctum**: API Authentication.
- **Cashier**: Stripe Subscription scaffolding ready.
