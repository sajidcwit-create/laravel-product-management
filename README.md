# Laravel Product Management — Module 15 Assignment

A simple Product Management module built with Laravel demonstrating routing, controllers, Blade templating, migrations, sessions/logging, Query Builder, and Eloquent ORM relationships.

## 🎥 Presentation Video
https://drive.google.com/drive/folders/1XNb82iAmwPj2UVAWw0o8i4zFPZWmzlGB?usp=drive_link

## ⚙️ Setup Instructions

1. **Create a fresh Laravel project** (if you haven't already):
   ```bash
   composer create-project laravel/laravel laravel-product-management
   cd laravel-product-management
   ```

2. **Copy these files into the new project**, matching the same folder paths:
   - `routes/web.php`
   - `app/Http/Controllers/*.php`
   - `app/Models/*.php`
   - `database/migrations/*.php`
   - `database/factories/*.php`
   - `database/seeders/DatabaseSeeder.php`
   - `resources/views/**`

3. **Configure your `.env`** with database credentials, then create the database.

4. **Run migrations and seed demo data:**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Serve the app:**
   ```bash
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000`

## 📋 Task-to-Feature Map

| Task | Where to find it |
|------|-------------------|
| **Task 1** — Routes, Controllers & Responses | `routes/web.php`, `ProductController@index` (View), `@indexJson` (JSON), `@redirectDemo` (Redirect), `@show` (Product Details) |
| **Task 2** — Blade Templates | `resources/views/layouts/app.blade.php` (`@extends`/`@section`/`@yield`) + `resources/views/partials/*` (`@include`) |
| **Task 3** — Migrations | `database/migrations/*_create_categories_table.php`, `*_create_products_table.php` (with `foreignId('category_id')->constrained()`) |
| **Task 4** — Session & Logging | `ProductController@create`, `@store` (session flash + `Log::info`), `@confirmation` — visit `/products/create` |
| **Task 5** — Query Builder | `ProductController@queryDemo` using `DB::table('products')` — visit `/products/query-demo` |
| **Task 6** — Eloquent ORM | `app/Models/Category.php` (`hasMany`), `app/Models/Product.php` (`belongsTo`), `CategoryController@index` (eager loading) — visit `/categories` |
| **Task 7** — Dashboard | `DashboardController@index` — visit `/` |

## 🗺️ Routes Overview

| Route | Method | Purpose |
|---|---|---|
| `/` | GET | Dashboard (Task 7) |
| `/products` | GET | Product list (View Response) |
| `/products/json` | GET | Product list (JSON Response) |
| `/products/redirect-demo` | GET | Redirect Response demo |
| `/products/create` | GET | Product create form (Task 4) |
| `/products` | POST | Store product (Task 4) |
| `/products/confirmation/{product}` | GET | Confirmation page (Task 4) |
| `/products/query-demo` | GET | Query Builder search/sort/count (Task 5) |
| `/products/{product}` | GET | Product details (Task 1) |
| `/categories` | GET | Categories with products, eager loaded (Task 6) |
