# 🚀 CodeIgniter 4 CRUD Application — `ci4_crud_app`

A simple CRUD (Create, Read, Update, Delete) web application built using **CodeIgniter 4** and **MySQL**.

This app demonstrates basic CRUD operations for a `users` table with a **unique email constraint**, styled using plain HTML/CSS.

---

## 🧩 Features

- ✅ Add, Edit, Delete, and View users
- ✅ Email must be unique
- ✅ Server-side validation (name, email)
- ✅ CSRF protection enabled
- ✅ Uses CodeIgniter's built-in MVC pattern
- ✅ Works locally on WAMP/XAMPP or CodeIgniter’s `spark serve`

---

## 🧱 Technology Stack

| Layer | Technology |
|--------|-------------|
| **Backend** | PHP 8+ (CodeIgniter 4 Framework) |
| **Database** | MySQL / MariaDB |
| **Frontend** | HTML, CSS (simple inline styling) |
| **Server** | Apache (WAMP) or PHP built-in server |

---

## ⚙️ Setup Instructions

### 1️⃣ Requirements
- PHP **7.4 or higher**
- Composer
- MySQL / phpMyAdmin
- WAMP / XAMPP (or any local server)

---

### 2️⃣ Project Installation

#### 🧰 Create the project
```bash
composer create-project codeigniter4/appstarter ci4_crud_app
cd ci4_crud_app
🧩 Add the CRUD files
Copy the following provided files into the project:

swift
Copy code
app/Controllers/Users.php
app/Models/UserModel.php
app/Views/users/index.php
app/Views/users/form.php
app/Database/Migrations/2025-01-01-000001_CreateUsers.php
app/Config/Routes.php   (add routes)
3️⃣ Database Setup
🪄 Create the database
Run this SQL in phpMyAdmin or MySQL CLI:

sql
Copy code
CREATE DATABASE IF NOT EXISTS ci4_crud;
USE ci4_crud;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(191) NOT NULL UNIQUE
);
You can also use:

bash
Copy code
php spark migrate
to automatically create the table using the migration file.

4️⃣ Configure .env
Copy .env from the default env file:

bash
Copy code
cp env .env
Then update the following lines:

ini
Copy code
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost/ci4_crud_app/public/'

database.default.hostname = localhost
database.default.database = ci4_crud
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
5️⃣ Run the Application
Option A — Using CodeIgniter’s built-in server
bash
Copy code
php spark serve --host=localhost --port=8080
Open in your browser:

bash
Copy code
http://localhost:8080/users
Option B — Using WAMP
Place your project inside:

makefile
Copy code
C:\wamp64\www\ci4_crud_app
Start Apache & MySQL from WAMP.
Then open:

bash
Copy code
http://localhost/ci4_crud_app/public/users
📋 Application Routes
Method	URL	Action
GET	/users	List all users
GET	/users/create	Show Add User form
POST	/users/create	Submit new user
GET	/users/edit/{id}	Show Edit form
POST	/users/edit/{id}	Update user
GET	/users/delete/{id}	Delete user

📦 Folder Structure (simplified)
pgsql
Copy code
ci4_crud_app/
│
├── app/
│   ├── Controllers/
│   │   └── Users.php
│   ├── Models/
│   │   └── UserModel.php
│   ├── Views/
│   │   └── users/
│   │       ├── index.php
│   │       └── form.php
│   ├── Database/
│   │   └── Migrations/
│   │       └── 2025-01-01-000001_CreateUsers.php
│   └── Config/
│       └── Routes.php
│
├── public/
│   ├── index.php
│   └── .htaccess
│
├── .env
└── README.md
🧠 How It Works
Users controller handles all CRUD operations.

UserModel interacts with the users table.

Views under app/Views/users/ render forms and tables.

CodeIgniter handles routing and CSRF protection automatically.

✅ Troubleshooting
Problem	Fix
❌ “Whoops! We seem to have hit a snag.”	Set CI_ENVIRONMENT = development in .env to view real errors
❌ “users table does not exist”	Run php spark migrate or use the SQL query above
❌ “404 Not Found”	Use /public/ in the URL or enable mod_rewrite in Apache
❌ “Email already exists!”	The email field is unique — use a different one
Blank page	Enable development mode and check logs in writable/logs/

🧱 Future Enhancements
✅ Add Bootstrap styling

✅ Add AJAX (no page reloads)

✅ Add pagination and search

✅ Use SweetAlert for success/error messages

👨‍💻 Author
Your Name
📧 satyasrinath6@gmail.com
🌐 GitHub: yourusername

🪪 License
This project is open-source under the MIT License — free to use and modify.

markdown
Copy code

---

### ✅ Quick Summary
- **Database name:** `ci4_crud`
- **Table name:** `users`
- **Main page:** `http://localhost/ci4_crud_app/public/users`
- **Main files:** `Users.php`, `UserModel.php`, `index.php`, `form.php`, `Routes.php`
- **Unique field:** `email`

---

Would you like me to add a **Bootstrap 5 styled version** of the same CRUD (modern UI, same logic)? It’ll look great for your portfolio and needs only one CSS/JS link addition.







