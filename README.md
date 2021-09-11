# Restful-Api-Test
Repository ini adalah restful api menggunakan codeigniter 4 untuk test sebagai backend developer.

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
2. Run `php spark migration` to create the necessary tables.
3. And then run `php spark serve` to run this project server.


