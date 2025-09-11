# Laravel & Filament Test Project

## Project Overview

This project is a sample Laravel application integrated with **Filament Admin Panel**.  
It demonstrates CRUD operations, dashboard widgets, Livewire components, reactive fields, and queued jobs.  

**User:** project-test@projecttest.com.au  
**Password:** oxhyV9NzkZ^02MEB  

The project follows the provided technical assignment specification.

---

## Features Implemented

- Laravel 10+ with SQLite database  
- Filament Admin Panel with custom dashboard  
- CRUD for main and reference models: Products, Product Colors, Product Categories, Product Types  
- Reactive fields with suffix spinner (partially implemented)  
- Dashboard widget displaying counts of models (Products, Categories, Types, Colors)  
- Queued jobs for processing products  
- Basic status bar for products (custom field)  
- Seeded data for Product Colors  
- Tailwind CSS theme customization (sidebar color override)  

**Note:** Some features, including full API integration for suffix validation, info list view, and advanced suffix action, are partially implemented.

---

## Installation

1. ## Clone the repository:

```bash
git clone <repository_url>
cd <project-folder>

2. ## Install dependencies:

composer install
npm install
npm run dev

3. ## Create environment file:

cp .env.example .env

4. ## Set SQLite database path in .env:

DB_CONNECTION=sqlite
DB_DATABASE=C:/Users/rathn/OneDrive/Documents/Malshani/Webco-LaravelProject/filament-test/database/database.sqlite

5. ## Create SQLite database file:

touch database/database.sqlite


6. ## Run migrations and seeders:

php artisan migrate --seed


7. ## Serve the application:

php artisan serve


8. ## Visit the app at 
http://localhost:8000/admin

9. ## 4. Dashboard Access

- **Email:** admin@example.com  
- **Password:** password123
