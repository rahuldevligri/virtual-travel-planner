```markdown
# Project: Virtual Travel Planner (Car Rental Website)

## 1. Purpose
A simple, responsive business website for a car rental service located in
Durgapura, Jaipur. The site should look professional, load fast, and let
customers request a quote for car rental.

## 2. Tech Stack
- Backend: Core PHP (no framework)
- Database: MySQL
- Frontend: HTML5, CSS3, vanilla JavaScript
- Server: XAMPP / WAMP (local development)
- Folder structure must be clean and modular.

## 3. Pages / Sections (Single-page scroll + separate contact page)
1. **Home** – Hero banner with tagline, brief intro, CTA "Get a Quote"
2. **About Us** – Company story, location (Durgapura, Jaipur)
3. **Our Services** – Cards for:
   - Local Car Rental
   - Outstation Trips
   - Airport Pickup & Drop
   - Corporate Rentals
4. **Clients Reviews** – 3–4 sample testimonials (static)
5. **Contact / Get a Quote** – Form with fields:
   - Name (required)
   - Phone (required, 10 digits)
   - Email (optional, valid format)
   - Service Type (dropdown: Local / Outstation / Airport / Corporate)
   - Pickup Date
   - Message (optional)

## 4. Functional Requirements
- Quote form must submit to `submit_quote.php` via POST.
- Server-side validation:
  - Name: non-empty, max 100 chars
  - Phone: exactly 10 digits
  - Email: valid format if provided
  - Service Type: must be one of the allowed values
- On success: show a "Thank you" message and store the request in DB.
- On failure: show field-level error messages, do NOT lose user input.
- All DB queries must use **prepared statements** (prevent SQL injection).
- Sanitize all output with `htmlspecialchars()` (prevent XSS).

## 5. Database Schema (MySQL)
Table: `quote_requests`
| Column       | Type           | Notes                        |
|--------------|----------------|------------------------------|
| id           | INT AUTO_PK    | Primary key                  |
| name         | VARCHAR(100)   | NOT NULL                     |
| phone        | VARCHAR(15)    | NOT NULL                     |
| email        | VARCHAR(100)   | NULL allowed                 |
| service_type | VARCHAR(50)    | NOT NULL                     |
| pickup_date  | DATE           | NULL allowed                 |
| message      | TEXT           | NULL allowed                 |
| created_at   | TIMESTAMP      | DEFAULT CURRENT_TIMESTAMP    |

## 6. Folder Structure (expected)
```
virtualtravelplanner/
├── index.php
├── about.php
├── services.php
├── contact.php
├── submit_quote.php
├── config/
│   └── db.php            (DB connection, uses .env-style constants)
├── includes/
│   ├── header.php
│   └── footer.php
├── assets/
│   ├── css/style.css
│   └── js/main.js
├── sql/
│   └── schema.sql        (CREATE TABLE statement)
├── .env.example          (DB creds template, NOT real values)
├── README.md
└── spec.md
```

## 7. Design Rules
- Mobile-first, responsive (use CSS flexbox/grid, no Bootstrap needed).
- Colors: professional blue/white/grey palette.
- Follow separation of concerns: DB logic in `config/`, HTML in pages,
  shared layout in `includes/`.
- No hardcoded credentials anywhere in code. Use `.env` + a config loader.

## 8. Tests Required
Write and run these tests (can be simple PHP scripts or manual checks):
1. Submitting valid data → row inserted in DB, success message shown.
2. Submitting with empty name → error shown, no DB insert.
3. Submitting with 5-digit phone → error shown.
4. Submitting with invalid email → error shown.
5. Submitting service_type = "hack" → error shown (allowlist check).
6. SQL injection attempt in name (e.g., `' OR 1=1 --`) → safely escaped, no breach.
```

---