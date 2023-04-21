# Laravel Commands

- Create project
```console
composer create-project laravel/laravel Project_Name
```

- Create database and tables
```console
php artisan migrate
```

- Create fresh tables and seed database
```console
php artisan migrate:fresh --seed
```

- Create model with migrations, factory and resource controller
```console
php artisan migrate:model Model_Name -mcr
```