# ci4_crud_app

A minimal **CodeIgniter 4** CRUD application (Users) using MySQL.  
Database name used by this project: **ci4_crud**.

## Features

- Create / Read / Update / Delete users
- Email field is unique (no duplicate emails)
- Simple server-rendered views (no JS frameworks)
- Uses CodeIgniter 4 validation and CSRF protection

## Project Files (important)

- `app/Database/Migrations/2025-01-01-000001_CreateUsers.php` — migration to create `users` table
- `app/Models/UserModel.php` — model
- `app/Controllers/Users.php` — controller
- `app/Views/users/index.php` — listing view
- `app/Views/users/form.php` — add/edit form
- `app/Config/Routes.php` — routes (add routes provided in README)
- `.env` — set database name to `ci4_crud` (see instructions)

## Requirements

- PHP 7.4+ (PHP 8 recommended)
- Composer
- MySQL / MariaDB
- WAMP / XAMPP or a working webserver (Apache) OR use CodeIgniter built-in server

## Setup (step-by-step)

1. **Create CI4 project** (if not already):
   ```bash
   composer create-project codeigniter4/appstarter ci4_crud_app
   cd ci4_crud_app
Place provided files into the project (models, controllers, views, migration).

Configure .env
Copy env → .env and update:

ini
Copy code
database.default.hostname = localhost
database.default.database = ci4_crud
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
app.baseURL = 'http://localhost:8080/'
Create database (via phpMyAdmin or MySQL CLI):

sql
Copy code
CREATE DATABASE IF NOT EXISTS ci4_crud;
Run migrations:

bash
Copy code
php spark migrate
If using WAMP and php isn't in PATH, run the php.exe from WAMP's php folder, e.g.:

arduino
Copy code
"C:\wamp64\bin\php\php8.x.x\php.exe" spark migrate
Serve the app (dev):

bash
Copy code
php spark serve --host=localhost --port=8080
Open: http://localhost:8080/users

Or copy project into WAMP www and open:
http://localhost/ci4_crud_app/public/users (adjust folder name).

Notes & Tips
Migration uses VARCHAR(191) for email to avoid index-size issues with utf8mb4.

is_unique[users.email] handles unique email validation on create. Edit action checks uniqueness only if email was changed.

If you get blank pages or errors, set CI_ENVIRONMENT = development in .env to see error details.

For production, configure proper DB password and consider using environment-specific configs.

Troubleshooting
DB connection errors: verify .env DB credentials and that MySQL is running.

php spark not found on Windows: call the php.exe inside WAMP (see above).

Migration error about key length: this setup already uses VARCHAR(191) to avoid it.

License & Author
MIT License — feel free to use and adapt.

Author: Your Name — satyasrinath6@gmail.com

---

## 8) Quick commands summary

```bash
# create project (if needed)
composer create-project codeigniter4/appstarter ci4_crud_app
cd ci4_crud_app

# after placing files & updating .env
php spark migrate
php spark serve --host=localhost --port=8080
# visit http://localhost:8080/users