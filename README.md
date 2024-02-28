# image-uploader

This repository contains an image uploader (Also works with videos). This has been made with Laravel and Tailwindcss. The package consists of using the FilePond CDN.

## Installation

Clone Repo:
```
https://github.com/Ssionn/programming-blog.git
```

Run composer and npm:
```
composer install
```
```
npm install
```

## How to Run

Clone example .env to .env and generate a key.
```
cp .env.example .env
```
```
php artisan key:generate
```

Adjust your database username and password.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=programming_blog
DB_USERNAME=root
DB_PASSWORD=
```

Run this to activate TailwindCSS
```
npm run dev
```

# Storage

Don't forget to link storage before uploading any pictures
```
php artisan storage:link
```

## Apache not working?

Well it's not going to run on xampp. Use the artisan server instead (USE THIS IF YOU WANT THE OAUTH WORKING)
```
php artisan serve
```

⚠️ RUN THIS NEXT TO NPM RUN DEV

Mac / Herd

If you don't want to use the built-in server, you can go for [Laravel Herd](https://herd.laravel.com/).
You then visit

```
{YourProjectName}.test/
```
