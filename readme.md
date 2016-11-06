# PetiteCRM #
Simple, human friendly CRM and Sales tool

It is made on Laravel 5.2, but there is a plan to upgrade it to a 5.3. Front-end is built using the [AdminLTE theme](https://almsaeedstudio.com/themes/AdminLTE/index2.html). It was integrated using [AdminLTE template Laravel 5 package](https://github.com/acacha/adminlte-laravel). 

## Instalation ##
You'll need at least PHP 7.0 and MySQL 5.7 to run it. Also, you'll need [Composer](https://getcomposer.org/) to install dependencies, [npm](https://www.npmjs.com/) and [Gulp](http://gulpjs.com/) are necessery as well.

##### Mac & Linux #####

1. CLone repository to desired destination and enter directory 

    `git clone https://github.com/srdjanmarjanovic/petitecrm && cd petitecrm` 
2. Copy .env.sample to .env

    `cp .env.sample .env`
3. Open .env in your favorite text editor and change the values of DB related variables to reflect your setup. Here is an example:

    ```bash
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crm
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
4. Install dependencies 

    `composer install`  
5. Generate app key with 

    `php artisan key:generate`
6. Run migrations with 

    `php artisan migrate`
7. _Optional:_ Run php server 

    `php artisan serve`