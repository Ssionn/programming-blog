# Programming-blog

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

## What does it look like?

![CleanShot 2024-03-04 at 16 59 17@2x](https://github.com/Ssionn/programming-blog/assets/90753599/4d82a023-084f-4791-8ca4-796c9ac91b4c)

![CleanShot 2024-03-04 at 17 02 30@2x](https://github.com/Ssionn/programming-blog/assets/90753599/dedc178d-d9de-4b48-9877-a66e9747058f)

![CleanShot 2024-03-04 at 17 00 54@2x](https://github.com/Ssionn/programming-blog/assets/90753599/2174bb4a-5b65-47e2-a375-977a43e46133)

![CleanShot 2024-03-04 at 17 01 39@2x](https://github.com/Ssionn/programming-blog/assets/90753599/5b64a2fc-f95b-4bec-8141-8432a5fc3252)

![CleanShot 2024-03-04 at 17 02 00@2x](https://github.com/Ssionn/programming-blog/assets/90753599/9d884b1d-43f0-4cf4-a114-ac8da4cb23e8)



