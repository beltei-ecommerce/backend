# Ecommerce (Backend)​ 🎊🎊🎊

## Prerequisites 🧨🧨

Before you begin, ensure you have met the following requirements:

- PHP >= 8.1
- Composer
- MySQL or another supported database

## Installation 🧨🧨

### Steps

Location copy file from `.env.example` to `.env`

**Database connection**
- `DB_CONNECTION`: `"mysql"`.
- `DB_HOST`: `"127.0.0.1"`.
- `DB_PORT`: `"3306"`.
- `DB_DATABASE`: `"example_db"`.
- `DB_USERNAME`: `"your_username"`.
- `DB_PASSWORD`: `"your_password"`.

**Mail connection**
- `MAIL_MAILER`: `"smtp"`.
- `MAIL_HOST`: `"smtp.gmail.com"`.
- `MAIL_PORT`: `"587"`.
- `MAIL_USERNAME`: `"admin@example.com"`.
- `MAIL_PASSWORD`: `"your_secret_key"`.
- `MAIL_ENCRYPTION`: `"tls"`.
- `MAIL_FROM_ADDRESS`: `"admin@example.com"`.​
- `MAIL_FROM_NAME`: `"Ecommerce Admin"`.​
- `FRONTEND_APP_BASE_URL`: `"http://localhost:3000"`.​


**Following commands**
- Install dependencies: `composer install`
- Generate key: `php artisan key:generate`
- Migrations and seeds: `composer run-script migrate:seed`
- Start server: `php artisan serve`

## ✨🎉🎉 Great! Let's go to use  Ecommerce Application ! 🎉🎉✨

**Following users**
- Admin: `admin@example.com` | Password: `123`
- User: `user@example.com` | Password: `123`