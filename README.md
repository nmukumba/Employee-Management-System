# Employee-Management-System

A simple employee management system

## Getting Started

Clone the project repository by running the command below if you use SSH

```bash
git clone git@github.com:nmukumba/Employee-Management-System.git
```

If you use https, use this instead

```bash
git clone https://github.com/nmukumba/Employee-Management-System.git
```

After cloning, run:

```bash
composer install
```

```bash
npm install
```

Duplicate `.env.example` and rename it `.env`

Then run:

```bash
php artisan key:generate
```

### Prerequisites

Be sure to fill in your database details in your `.env` file before running the migrations:

```bash
php artisan migrate
```

And finally, start the application:

```bash
php artisan serve
```

and visit [http://localhost:8000](http://localhost:8000) to see the application in action.

## Built With

* [Laravel](https://laravel.com) - The PHP Framework For Web Artisans
