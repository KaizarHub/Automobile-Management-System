# KD Automobile Management System (KDAMS)

A polished PHP/MySQL automobile inventory and sales management system.

## Highlights
- Responsive professional dashboard
- KDAMS branding throughout the application
- Role-based access for Administrator, Inventory Manager and Sales Manager
- Inventory/category/media management
- Sales entry and reporting
- Mobile-friendly sidebar navigation
- Improved authentication with `password_hash()` for new users
- Backward-compatible authentication for legacy SHA-1 accounts
- UTF-8/UTF8MB4 database design with useful indexes and foreign keys
- Demo automobile parts data for a clean academic presentation
- Apache hardening and upload-directory protection

## Recommended environment
- PHP 8.1+
- MySQL 8+ / MariaDB 10.4+
- Apache 2.4+
- XAMPP or WAMP for local demonstration

## Installation
1. Extract the ZIP into your web root.
2. Start Apache and MySQL/MariaDB.
3. Import `DATABASE FILE/kdams_database.sql` in phpMyAdmin.
4. Confirm database credentials in `includes/config.php`.
5. Browse to the project URL.
6. Use the demo credentials from `01 LOGIN DETAILS & PROJECT INFO.txt`.

## Demo credentials
- Admin: `Admin` / `Admin@123`
- Inventory: `Inventory` / `Admin@123`
- Sales: `Sales` / `Admin@123`

Change the demo passwords before real-world use.

