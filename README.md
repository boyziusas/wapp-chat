# wapp-chat

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.6/installation#installation)

//
PHP ≥ 7.3.0
Laravel = 5.3


Clone the project repository by running the command below if you use SSH

```
git clone git@github.com:boyziusas/wapp-chat.git
```

If you use https, use this instead

```
git clone https://github.com/boyziusas/wapp-chat.git
```

Switch to the repo folder

```
cd wapp-chat
```

Install all the dependencies using composer

```
composer install
```

Copy the example env file and **make the required configuration changes and fill missing entries from app.chat-api.com page** in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Don't forget to run node commands

```
npm install && npm run dev
```

Start the local development server

```
php artisan serve
```

You can now access the server at http://127.0.0.1:8000

**Used command list**

```
git clone git@github.com:boyziusas/wapp-chat.git
cd wapp-chat
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run dev
php artisan serve 
```
