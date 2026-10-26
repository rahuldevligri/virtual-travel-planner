# Virtual Travel Planner - Car Rental Website

A responsive, professional business website for a premier car rental service located in **Durgapura, Jaipur, Rajasthan**. Built using pure Core PHP, MySQL, HTML5, modern vanilla CSS3, and vanilla JavaScript without external framework dependencies.

---

## Tech Stack
- **Backend:** Core PHP (Procedural / Modular functions, PDO, Prepared Statements)
- **Database:** MySQL / MariaDB (InnoDB, UTF-8 mb4)
- **Frontend:** HTML5, Modern CSS3 (Flexbox & CSS Grid, Mobile-First), Vanilla JavaScript
- **Local Environment:** XAMPP, WAMP, LAMP, or built-in PHP development server

---

## Folder Structure

```
virtual-travel-planner/
├── index.php                     # Home page (Hero, About brief, Services overview, Reviews, CTAs)
├── about.php                     # About page (Company story, fleet standards, core values)
├── services.php                  # Detailed services (Local, Outstation, Airport, Corporate)
├── contact.php                   # Contact page & Quote booking form with validation feedback
├── submit_quote.php              # POST request handler with validation, prepared statements & PRG
├── config/
│   └── db.php                    # PDO connection manager & lightweight .env parser
├── includes/
│   ├── header.php                # Global header, meta tags, responsive navigation menu
│   └── footer.php                # Global footer, contact info, Jaipur location, script links
├── assets/
│   ├── css/
│   │   └── style.css             # Responsive, mobile-first stylesheet (Blue/White/Grey theme)
│   └── js/
│       └── main.js               # Mobile navigation toggle & client-side validation
├── sql/
│   └── schema.sql                # MySQL database & table creation script
├── tests/
│   └── test_quote_submission.php # Automated test runner for validation & database security
├── .env.example                  # Environment configuration template (DB credentials)
├── spec.md                       # Project specification document
└── README.md                     # Setup instructions and documentation
```

---

## Setup & Installation (XAMPP / WAMP)

### 1. Place the Project in Web Server Directory
Place this project inside your local web server root directory:
- **XAMPP (Windows):** `C:\xampp\htdocs\virtual-travel-planner`
- **WAMP (Windows):** `C:\wamp64\www\virtual-travel-planner`
- **Linux/macOS:** `/var/www/html/virtual-travel-planner`

### 2. Configure Environment (`.env`)
Copy `.env.example` to create `.env`:
```bash
cp .env.example .env
```
*(On Windows, you can also copy and rename the file using File Explorer).*

Open `.env` and verify your database connection credentials. Default local XAMPP settings:
```ini
DB_HOST=127.0.0.1
DB_PORT=3306
DB_NAME=virtual_travel_planner
DB_USER=root
DB_PASS=
```
> **Note:** If `.env` is missing, `config/db.php` will fail gracefully with a descriptive error message guiding you to create `.env`.

### 3. Start Apache & MySQL
Open your XAMPP or WAMP Control Panel and start both **Apache** and **MySQL** services.

### 4. Import the Database Schema
You can import `sql/schema.sql` via **phpMyAdmin** or command line:

#### Option A: Via phpMyAdmin
1. Open `http://localhost/phpmyadmin` in your web browser.
2. Click the **Import** tab.
3. Choose the file `sql/schema.sql` located inside the project.
4. Click **Go** / **Import**. This creates the `virtual_travel_planner` database and `quote_requests` table.

#### Option B: Via Command Line (MySQL CLI)
```bash
mysql -u root -p < sql/schema.sql
```
*(Press Enter if your root user has no password).*

### 5. Access the Website
Open your browser and navigate to:
```
http://localhost/virtual-travel-planner/
```

---

## Running the Automated Test Suite

A standalone test runner is located at `tests/test_quote_submission.php`.

The test runner:
1. Verifies that MySQL is reachable and the `quote_requests` table exists. If not, it displays:
   `"Please start MySQL in XAMPP and import sql/schema.sql first."`
2. Runs all 6 required test scenarios:
   - **Test 1:** Valid data submission (row inserted in DB, returns row ID).
   - **Test 2:** Empty name validation (returns "Full Name is required", no DB insert).
   - **Test 3:** 5-digit phone validation (returns "Phone number must be exactly 10 digits", no DB insert).
   - **Test 4:** Invalid email format validation (returns "Please enter a valid email address", no DB insert).
   - **Test 5:** Disallowed service type / tampering check (returns allowlist error, no DB insert).
   - **Test 6:** SQL injection attempt in name (safely parameterized through PDO; payload stored safely as literal text).

### Run Tests via Command Line:
```bash
php tests/test_quote_submission.php
```

Or open in your browser:
```
http://localhost/virtual-travel-planner/tests/test_quote_submission.php
```

---

## Key Features & Standards Followed

1. **Security & Injection Prevention:**
   - All database queries strictly utilize PDO **prepared statements** with bound parameters to prevent SQL injection.
   - All user inputs rendered in the DOM are sanitized using `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` to prevent Cross-Site Scripting (XSS).
2. **Post-Redirect-Get (PRG) Pattern:**
   - Form submissions to `submit_quote.php` redirect back to `contact.php` with session flash state (`$_SESSION['flash_success']`, `$_SESSION['flash_errors']`, `$_SESSION['old_input']`), preventing duplicate form resubmissions on browser refresh.
3. **No Hardcoded Credentials:**
   - Database credentials reside strictly in `.env`.
4. **Mobile-First Responsive Design:**
   - Pure vanilla CSS3 utilizing flexbox and CSS grid with smooth breakpoints for mobile, tablet, and desktop viewports.
