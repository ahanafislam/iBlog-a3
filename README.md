# iBlog - A Laravel Blog Platform

A full-featured blog platform built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire), featuring a complete admin dashboard, user roles, and a dynamic frontend.

## Features

-   **Role-Based Access Control (RBAC):**
    -   **Admin:** Full control over the application, including user and category management.
    -   **Content Creator:** Can create, edit, and manage their own posts.
    -   **User/Reader:** Can browse and read posts.
-   **Admin Dashboard:**
    -   Statistics overview (total posts, categories, users).
    -   Paginated lists for managing posts, categories, and users.
    -   Full CRUD functionality for posts and categories.
-   **Dynamic Frontend:**
    -   Posts displayed under their respective categories.
    -   Filter posts by category.
    -   Sort posts by newest or oldest.
-   **Database Seeding:** Includes factories for posts, categories, and users to quickly populate the blog with sample data.

## Technologies Used

-   **Backend:** PHP, Laravel
-   **Frontend:** JavaScript, Tailwind CSS, Blade
-   **Database:** MySQL / MariaDB (or your preferred choice)
-   **Development:** Vite, pnpm

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

-   PHP (version as required by the project's `composer.json`)
-   Composer
-   Node.js and pnpm
-   A database server (e.g., MySQL)

### Installation

1.  **Clone the repository:**
    ```bash
    git clone <your-repository-url>
    cd iBlog-A3
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Create your environment file:**
    Copy the example environment file.
    ```bash
    cp .env.example .env
    ```

4.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Configure your `.env` file:**
    Open the `.env` file in a text editor and add your database connection details (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

6.  **Install frontend dependencies:**
    ```bash
    pnpm install
    ```

7.  **Build frontend assets:**
    ```bash
    pnpm run build
    ```

8.  **Run database migrations and seed the database:**
    This command will create the database schema and populate it with sample data (users, categories, posts).
    ```bash
sh
    php artisan migrate:fresh --seed
    ```

9.  **Link the storage directory:**
    This makes your user-uploaded thumbnails publicly accessible.
    ```bash
    php artisan storage:link
    ```

10. **Serve the application:**
    ```bash
    php artisan serve
    ```
    Your application will be available at `http://127.0.0.1:8000`.

## Default Login Credentials

The database seeder creates the following users you can use to log in:

-   **Admin:**
    -   **Email:** `admin@example.com`
    -   **Password:** `password`
-   **Content Creator:**
    -   **Email:** `creator@example.com`
    -   **Password:** `password`
-   **Regular User:**
    -   **Email:** `user@example.com`
    -   **Password:** `password`