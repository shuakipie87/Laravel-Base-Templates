# Laravel 12 Boilerplate Guide

## 1. Prerequisites

- Docker Desktop (ensure Docker Compose V2 is enabled)
- Node.js & NPM (for local asset building if not using Docker for node)

## 2. Installation

### Linux / macOS

bash

# 1. Clone repository

git clone <url>
cd <project>

# 2. Setup Environment

cp .env.example .env

# 3. Build & Start Containers

docker compose up -d --build

# 4. Install Dependencies

docker compose exec app composer install
docker compose exec app npm install
docker compose exec app npm run build

# 5. Generate Key & Migrate

docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed

### Windows (WSL2)

_Note: Run these commands inside your WSL2 terminal (Ubuntu), not PowerShell._
bash

# 1. Clone & Setup

git clone <url>
cd <project>
cp .env.example .env

# 2. Start Docker

docker compose up -d --build

# 3. Install Deps

docker compose exec app composer install
docker compose exec app npm install
docker compose exec app npm run build

# 4. Init

docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed

## 3. Troubleshooting

**"Class not found" error:**
Run:
docker compose exec --user root app bash
composer dump-autoload -o

**Permission Denied:**
docker compose exec --user root app bash

sudo chown -R $USER:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

## 4. Authentication (Breeze)

The project is prepared for Breeze. To scaffold the views and controllers:
bash
docker compose exec app php artisan breeze:install blade

# Then rebuild assets

docker compose exec app npm run build
