# Website Subscriber

A Laravel-based subscription management system that allows users to subscribe to websites and receive email notifications when new posts are published.

## Description

This application provides a RESTful API for managing website subscriptions. Users can subscribe to multiple websites, and when new posts are created on those websites, the system automatically sends email notifications to all subscribers. The email sending is handled asynchronously using Laravel's queue system to ensure optimal performance.

## Features

- **Website Management**: List all available websites
- **User Subscription**: Subscribe users to websites with email and name
- **Post Creation**: Create new posts associated with specific websites
- **Email Notifications**: Automatically send emails to subscribers when new posts are published
- **Queue-Based Email Delivery**: Emails are processed via a queue system for better performance
- **Email Logging**: Track which emails have been sent to prevent duplicate notifications

## Technology Stack

- **Backend Framework**: Laravel 9.x
- **PHP Version**: 8.x (8.0.2 minimum)
- **Database**: MySQL/PostgreSQL (configurable)
- **Queue System**: Database-driven queues
- **Email**: SMTP-based email delivery
- **API Authentication**: Laravel Sanctum
- **Build Tools**: Vite
- **Testing**: PHPUnit

## API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/websites` | List all websites |
| POST | `/api/post` | Create a new post for a website |
| POST | `/api/subscribe-user` | Subscribe a user to a website |

## How to Run

### Installation

- Install PHP 8.* and Apache
- Clone the repository:
  ```sh
  git clone https://github.com/raiyan24r/website-subscriber-test.git
  ```
- Rename `example.env` to `.env` in the root folder
- Configure database connection in `.env`:
  - `DB_CONNECTION`
  - `DB_HOST`
  - `DB_PORT`
  - `DB_DATABASE`
  - `DB_USERNAME`
  - `DB_PASSWORD`
- Configure email settings in `.env`:
  - `MAIL_MAILER`
  - `MAIL_HOST`
  - `MAIL_PORT`
  - `MAIL_USERNAME`
  - `MAIL_PASSWORD`
  - `MAIL_ENCRYPTION`
- Set `QUEUE_CONNECTION=database` if you want to run jobs from cron or supervisor
- Install dependencies:
  ```sh
  composer install
  ```
- Run migrations and seeders:
  ```sh
  php artisan migrate --seed
  ```
- Start the development server:
  ```sh
  php artisan serve --port=8090
  ```
- Start the queue worker for email processing:
  ```sh
  php artisan queue:work --queue=emails
  ```

## Test Project

- [Postman Collection](https://www.getpostman.com/collections/bf790cbc17ba54b4ef81)
- Command to send emails to website subscribers:
  ```sh
  php artisan email:subscribers
  ```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
