# Laravel Forum

A full-featured web forum built with **Laravel**, featuring user management, admin dashboard, categories, posts, and RSS feeds.

## Features

- **Public pages**: Home (latest forums), topic list, post viewing
- **Admin dashboard**: User management (CRUD), forum/topic/post management, profile manager
- **User system**: Registration, login, profile pages
- **Content**: Categories, posts with timestamps, RSS feed
- **Pages**: About, Contact form

## Tech Stack

- Laravel (PHP)
- MySQL/MariaDB
- Bootstrap (frontend)
- Composer dependencies

## Installation

```bash
git clone https://github.com/albertguedes/laravel-forum.git
cd laravel-forum
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## License

MIT License - see [LICENSE](LICENSE.md)
