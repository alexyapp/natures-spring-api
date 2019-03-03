## Nature's Spring Foundation Admin Panel and API
Adminal Panel and API for Nature's Spring Foundation website.

## Usage
Migrations:
```
php artisan migrate
```

Import Philippine locations:
```
php artisan import:island-groups
php artisan import:provinces
php artisan import:cities
php artisan generate:slugs
```

Install Passport:
```
php artisan passport:keys
php artisan passport:install
```

Populate database with default data (i.e. users, roles, etc.):
```
php artisan db:seed
```