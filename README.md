## Edu Course Manager - Laravel Project

This is a Laravel project. The following instructions will guide you through the process of setting it up from cloning the repository to running the app with Tailwind CSS.

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm (for Tailwind CSS)

## Installation

Follow the steps below to set up the project:

### 1. Clone the Repository

Clone the project repository to your local machine:

```
git clone https://github.com/Chronos-png/EduCourse-Manager.git

```

### 2. Install Composer

Enter on your project terminal:

```
composer install

```

### 3. Add .env

Change / Rename your ".env.example" file to  ".env"

### 4. Generate Key

Enter on your project terminal:

```
php artisan key:generate

```

### 5. Migrate Database with Seeder

Enter on your project terminal:

```
php artisan migrate --seed

```
If you don't want to migrate with seeder:

```
php artisan migrate

```

### 6. Install All Node Package

Enter on your project terminal:

```
npm install

```

## Run Project

### 1. Run Tailwind Css

Enter on your project terminal:

```
npm run dev
```
### 2. Run Laravel

Open new terminal and enter on your project new terminal:

```
php artisan serve
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
