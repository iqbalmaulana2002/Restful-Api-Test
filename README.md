# Restful-Api-Test
Repository ini adalah restful api menggunakan codeigniter 4 untuk latihan.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## After Download

Open this project in cmd and Run `composer install` to download the packages that this project requires.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## How to run :

1. Create a new database according to your database configuration settings in the .env . file.
2. Run `php spark migrate` to create the necessary tables.
3. And then run `php spark serve` to run this project server.

## Routes :

1. Access `localhost:8080/register` with method POST to register your account.
2. Access `localhost:8080/login` with method POST to login your account and get the token.
3. Access `localhost:8080/users` with method GET to display all users.
4. Access `localhost:8080/users/:name` with method GET to show all users by name.
5. Access `localhost:8080/users/id/:id` with method GET to show all users by id.
6. Access `localhost:8080/user/:id` with method PUT to update users by id.
6. Access `localhost:8080/user/:id` with method DELETE to delete users by id.


# Thanks
