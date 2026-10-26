# Project: Nihal Voyages Travel & Holidays (Rebrand & Update)

## 1. Client Identity & Branding
- **Business Name**: Nihal Voyages Travel & Holidays
- **Tagline**: More Destinations. Greater Stories.
- **Address**: 50/96, Sector 5, Partap Nagar, Jaipur (Near Partap Plaza) - 302033, Rajasthan
- **Phone**: +91 9680665356
- **Email**: info@nihalvoyages.in (Placeholder)
- **Color Theme**: Navy Blue (#0B192C) & Gold (#FFD700) with White/Light Grey background.
- **Font**: Modern Sans-serif (e.g., Poppins, Montserrat).

## 2. Tech Stack & Architecture
- **Backend**: Core PHP (Using existing PDO connection logic).
- **Database**: MySQL (Database name will be `nihal_voyages`).
- **Frontend**: HTML5, CSS3, Bootstrap 5 (for responsiveness), Vanilla JS.
- **Dynamic Requirement**: The site MUST be dynamic. Use PHP arrays or DB queries to loop through Services, Tour Packages, and Car models. Do not hardcode every card in HTML.

## 3. UI/UX Requirements (Responsive & Dynamic)
- **Header**: 
  - Top Bar: Phone, Email, Social Icons, "Enquiry Now" button (opens a modal).
  - Main Navbar: Logo, Menu (Home, About Us, Services Dropdown, Car Rental, Contact Us). Sticky navbar.
- **Hero Section**: Full-width dynamic image slider (carousel) with overlay text and CTA.
- **Floating Elements**: WhatsApp chat button, Call button (fixed on the right).
- **Footer**: 3-column layout (Logo+About, Quick Links, Contact Details). Dark Navy Blue background with Gold/White text.

## 4. Pages & Modules
1. **Home Page (index.php)**:
   - Hero Slider.
   - About Us snippet.
   - Services Grid (Cards: Air Tickets, Hotel Booking, Visa Services, Car Rental).
   - Popular Tour Packages (Image cards with titles).
   - Clients Reviews.
2. **Car Rental (car-rental.php)**:
   - Grid displaying Car Models (Sedan, SUV, LCV) with Images.
   - **Dynamic Flow**: Clicking "Book" on a car opens the Contact/Enquiry Form with that Car Model *pre-filled* in the message or a specific field.
3. **Contact Us (contact.php)**:
   - Main Enquiry Form.
   - Google Maps embed for Partap Nagar, Jaipur.

## 5. Database Schema (MySQL)
**Database**: `nihal_voyages`
**Table**: `enquiries`
- id (INT, PK, AUTO_INCREMENT)
- name (VARCHAR 100)
- phone (VARCHAR 15)
- email (VARCHAR 100)
- destination (VARCHAR 100, NULL)
- travel_date (DATE, NULL)
- travelers (INT, NULL)
- car_model (VARCHAR 50, NULL) -- If clicked from Car Rental page
- message (TEXT, NULL)
- created_at (TIMESTAMP)

## 6. Form Fields Requirement (Crucial)
The Enquiry Form (both on-page and popup modal) MUST have these fields:
1. Full Name (Required)
2. Contact No. (Required, 10 digits)
3. Email Address (Optional, Valid format)
4. Destination (Optional)
5. Travel Date (Optional)
6. Number of Travelers (Optional)
7. Message (Optional)

## 7. Rules for AI (Implementation)
- Do NOT create the project from scratch. Modify the existing codebase.
- Keep the security (PDO, htmlspecialchars, PRG pattern).
- Update the `.env` and `config/db.php` to use `nihal_voyages` database.
- Generate placeholder images in the `assets/images/` folder structure.