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

### 3. Add .env & Setting your .env 

Change / Rename your ".env.example" file to  ".env"

Add These line to your env, these are my midtrans api sandbox keys, feel free to use it, if you already have midtrans account you can change it !

```
MIDTRANS_SERVER_KEY=SB-Mid-server-z-fDsaYTSB1B_AjdjB7oLclV
MIDTRANS_CLIENT_KEY=SB-Mid-client-QoLkKfG8R6-PsSVj
MIDTRANS_IS_PRODUCTION=false
```

Add this line to ensure your project allow cors to all domain (optional)
```
CORS_ALLOW_ALL=true
```
If you run this project locally, make sure you already have certificate for your openssl in your php (if you run php externally) or your apache !!

Because this already happen to me before lol 😂 !!
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

### 1. Run Tailwind CSS

Enter on your project terminal:

```
npm run dev
```
### 2. Run Laravel

Open new terminal and enter on your project new terminal:

```
php artisan serve
```
## Authors

- [@Ahmad Ar-rosyid Hidayatullah](https://www.github.com/Chronos-png)


## About Laravel

![Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
