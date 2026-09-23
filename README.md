# Complete Point-of-Sale (POS) System
### IT0049 - Web System Technologies (Midterm Project)

A complete, database-backed Point-of-Sale application built using the **CodeIgniter 4** MVC framework. This system implements secure authentication, full CRUD management for products, customers, and staff, and features a functional sales transaction workflow that updates product inventory balances in real time.

---

## 🌟 Key Features
- **Authentication & Security:** Protected routes using a custom `AuthGuard` filter to prevent unauthenticated access to management areas.
- **Product Management:** Complete CRUD functionality with form validation and secure product image file uploads.
- **Customer Management:** Full CRUD tracking for registered client information.
- **Staff Management:** Complete CRUD system with secure password hashing (`password_hash`) and avatar file uploads.
- **Core Sales Workflow:** Records real-time transactions, calculates summary totals, automatically decreases inventory stock balances, and explicitly rejects requests that exceed available item quantities.

---

## 🛠️ Local Development Installation Setup

Follow these sequential steps to run this application locally on your machine using **XAMPP**:

### 1. Database Setup
1. Open your browser and navigate to your local control panel: `http://localhost/phpmyadmin/`.
2. Create a new database named exactly: **`pos_system`**.
3. Click on the `pos_system` database, go to the **SQL** tab, and execute the structural schema provided in the midterm brief to generate the tables (`products`, `customers`, `users`, `sales`).

### 2. Project Configuration
1. Ensure your local framework setup database configurations match your local development environment.
2. Locate the root project environment configuration file (`.env`). If it is named `env`, rename it to **`.env`**.
3. Verify that the database connection configuration details match your XAMPP installation settings:
   ```text
   database.default.hostname = localhost
   database.default.database = pos_system
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

### 3. File System Directories
Verify that the target directories for handling image uploads exist under your web workspace architecture. If they do not exist, create these folders:
- `public/uploads/products/`
- `public/uploads/avatars/`

### 4. Running Database Seeders
To populate your system with an initial administrative user profile for testing, open your workspace terminal in your project root folder and execute:
```bash
C:\xampp\php\php.exe spark db:seed UserSeeder
```
*Note: If you have configured PHP inside your global environment system path variables, you can run:* `php spark db:seed UserSeeder`

### 5. Accessing the Application
Launch your system server locally using the built-in Spark tool:
```bash
C:\xampp\php\php.exe spark serve
```
Open your web browser and go to: `http://localhost:8080`

---

## 🔐 Default Test Credentials
Use these generated seeder account values to bypass the login authorization guard:
- **Username:** `admin`
- **Password:** `password123`

---

## 📝 Program Outcomes (PO) & Course Learning Outcomes (CLO) Addressed
- **PO: C** - Design, implement and evaluate computer-based systems or applications to meet desired needs and requirements.
- **CLO: 2** - Apply advanced web development principles in creating, debugging, validating, and securing database-backed web applications.
- **CLO: 3** - Design program flow and application structure for computing problems using CodeIgniter frameworks.
