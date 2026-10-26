# Virtual Travel Planner 🚗

A modern, responsive car rental website built using Core PHP, MySQL, and AI Harness (Gemini CLI). 

## 🚀 Features
- **Fully Responsive UI**: Looks perfect on Mobile, Tablet, and Desktop.
- **Dynamic Services**: Cleanly structured arrays for Local, Outstation, Airport, and Corporate rentals.
- **Secure Enquiry Form**: Built with PDO and Prepared Statements to prevent SQL Injection.
- **Database Integration**: Stores customer quote requests securely in MySQL.
- **Clean Architecture**: Follows PRG (Post-Redirect-Get) pattern and includes a `.env` setup for credentials.

## 🛠️ Tech Stack
- **Backend:** PHP (Core)
- **Database:** MySQL (PDO)
- **Frontend:** HTML5, CSS3, Vanilla JavaScript
- **AI Tool Used:** Gemini CLI (for AI Harness assisted coding)

## 📸 Screenshots
![Home Page Preview](preview.png)
*(Note: Make sure you have a `preview.png` file in your root folder)*

## ⚙️ How to Run Locally
1. Clone this repository inside your XAMPP `htdocs/Projects` folder.
2. Start Apache and MySQL in XAMPP.
3. Create a database named `virtual_travel_planner` in phpMyAdmin.
4. Import the `sql/schema.sql` file.
5. Rename `.env.example` to `.env` and update your database credentials.
6. Open `http://localhost/Projects/virtual-travel-planner/` in your browser.
