# iBlog Management

A simple blog management system built with **Laravel** and **Blade**.  
This project demonstrates how to manage blog categories and posts with full CRUD functionality, validation, and pagination for both categories and posts.  

---

## ✨ Features

### 🔹 Categories
- Add new blog categories via a form.
- Validate category inputs (required `name`, unique `slug`).
- Display validation error messages in the form.
- Paginated list of categories in the admin panel.

### 🔹 Posts
- Create blog posts with fields:
  - Title
  - Content
  - Category (relationship: a category has many posts)
- Validate post inputs before submission.
- Display validation error messages clearly in the form.
- Paginated list of posts in the admin panel.

### 🔹 Frontend
- Show all categories and their respective posts.
- Display each post under its related category.
- Show post title, short description/content, and category name.

---

## 🛠️ Tech Stack
- **Laravel** (Backend & Blade Templates)
- **MySQL** (Database)
- **TailwindCSS** (Styling)
- **PNPM** (Package Manager for frontend assets)
- **Vite** (Bundler)

---

## 🚀 Installation & Setup

Follow these steps to set up the project locally:

### 1️⃣ Clone the repository

### 2️⃣ Install PHP dependencies

```bash
composer install
```

### 3️⃣ Install frontend dependencies

```bash
pnpm install && pnpm build
```

### 4️⃣ Configure environment

Copy `.env.example` to `.env` and update your database credentials:

```bash
cp .env.example .env
```

### 5️⃣ Run database migrations with seed data

```bash
php artisan migrate:fresh --seed
```

### 6️⃣ Link storage

```bash
php artisan storage:link
```

### 7️⃣ Start the development server

```bash
composer run dev
```

---

## 📖 Usage

* Access the admin panel to **manage categories** and **posts**.
* Create new categories and assign posts to them.
* Visit the frontend page to see categories and posts displayed together.

## 👨‍💻 Author

**Md Ahanaf Islam**
[Md Ahanaf Islam](https://github.com/ahanafislam)
