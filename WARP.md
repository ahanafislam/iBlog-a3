# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

This is **iBlog-A3**, a Laravel 12 blog application with hierarchical categories, user authentication, and a dashboard interface. The application features a traditional MVC architecture with modern frontend tooling using Vite and TailwindCSS.

## Development Commands

### Environment Setup
```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies 
pnpm install

# Copy environment file and generate app key
copy .env.example .env
php artisan key:generate

# Create SQLite database and run migrations
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate

# Seed the database with sample data
php artisan db:seed
```

### Development Server
```bash
# Start all development services (server, queue, Vite)
composer run dev

# Or run services individually:
php artisan serve                    # Laravel development server
php artisan queue:listen --tries=1   # Queue worker
pnpm run dev                         # Vite dev server
```

### Asset Building
```bash
# Development build
pnpm run dev

# Production build
pnpm run build
```

### Testing
```bash
# Run all tests using Pest
composer run test
# Or directly:
php artisan test

# Run tests with coverage
php artisan test --coverage
```

### Code Quality
```bash
# Format code using Laravel Pint
vendor/bin/pint

# Run specific file/directory
vendor/bin/pint app/Models
```

### Database Operations
```bash
# Run migrations
php artisan migrate

# Fresh migration with seeding
php artisan migrate:fresh --seed

# Create new migration
php artisan make:migration create_table_name

# Create model with migration and factory
php artisan make:model ModelName -mf
```

### Artisan Commands
```bash
# Generate various components
php artisan make:controller ControllerName
php artisan make:model ModelName
php artisan make:middleware MiddlewareName
php artisan make:request RequestName
php artisan make:component ComponentName

# Clear various caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Architecture Overview

### Core Models & Relationships
- **User**: Authenticatable users who can author posts
- **Category**: Hierarchical categories with parent-child relationships
- **Post**: Blog posts belonging to categories and authored by users

**Key Relationships:**
- Categories can have parent categories (self-referential)
- Posts belong to both a category and an author (user)
- Users can have many posts

### Route Organization
Routes are organized into separate files:
- `routes/web.php` - Public routes (homepage)
- `routes/auth.php` - Authentication routes (login, register)
- `routes/dashboard.php` - Admin dashboard routes (categories, posts management)

### Controller Structure
- **Public Controllers**: `HomeController` for frontend display
- **Auth Controllers**: Handle user registration and session management
- **Dashboard Controllers**: Admin interface for managing categories and posts
  - `DashboardController` - Main dashboard
  - `CategoryController` - Category CRUD operations
  - `PostController` - Post CRUD operations

### Frontend Architecture
- **Blade Templates**: Server-side rendering with Blade templating
- **TailwindCSS**: Utility-first CSS framework
- **Vite**: Modern build tool for asset compilation
- **View Components**: Reusable UI components (layout component exists)

### Database Schema
- **Categories**: Hierarchical with `parent_id` self-reference
- **Posts**: Foreign keys to `users` (author) and `categories`
- **Users**: Standard Laravel authentication table

### Helper Classes
- `StringHelper`: Utility for post content preview generation

## Development Workflow

### Adding New Features
1. Create migrations for database changes
2. Update or create models with relationships
3. Add routes to appropriate route file
4. Create controllers with proper resource methods
5. Build Blade views with TailwindCSS
6. Write tests using Pest framework

### Database Changes
Always create migrations for schema changes. The project uses SQLite for development with foreign key constraints properly configured.

### Testing Strategy
- Uses **Pest PHP** testing framework
- Test configuration in `tests/Pest.php`
- Separate `Feature` and `Unit` test directories
- SQLite in-memory database for testing

### Asset Management
- CSS files in `resources/css/`
- JavaScript files in `resources/js/`
- Vite configuration includes TailwindCSS plugin
- Assets are built to `public/build/` directory

## Important Files

### Configuration Files
- `composer.json` - Includes custom `dev` and `test` scripts
- `package.json` - Frontend dependencies and scripts
- `vite.config.js` - Asset build configuration with TailwindCSS
- `phpunit.xml` - Test configuration with SQLite

### Key Directories
- `app/Http/Controllers/Dashboard/` - Admin interface controllers
- `app/Helpers/` - Custom utility classes
- `app/View/Components/` - Blade components
- `database/factories/` - Model factories for testing
- `database/seeders/` - Database seeders

### Routes Registration
Dashboard routes are loaded separately and likely prefixed via route service provider configuration.
