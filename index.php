<?php
/**
 * Home Page
 * Virtual Travel Planner - Car Rental Website
 */
$pageTitle = 'Virtual Travel Planner | Car Rental Service in Durgapura, Jaipur';
$currentPage = 'index.php';
include_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Banner Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content">
      <div class="hero-badge">
        <span>📍</span> Based in Durgapura, Jaipur, Rajasthan
      </div>
      <h1 class="hero-title">
        Reliable, Comfortable & Affordable <span>Car Rentals</span> in Jaipur
      </h1>
      <p class="hero-desc">
        Experience seamless travel across the Pink City and beyond. From local city tours and daily commutes to outstation holidays and airport transfers, Virtual Travel Planner provides well-maintained cabs and professional chauffeurs.
      </p>
      <div class="hero-actions">
        <a href="contact.php" class="btn btn-primary" style="font-size: 1.05rem; padding: 0.85rem 1.75rem;">
          Request a Free Quote ➔
        </a>
        <a href="services.php" class="btn btn-outline" style="color: #ffffff; border-color: rgba(255,255,255,0.4);">
          Explore Our Services
        </a>
      </div>
      <div class="hero-stats">
        <div class="stat-item">
          <strong>10,000+</strong>
          <span>Happy Passengers</span>
        </div>
        <div class="stat-item">
          <strong>100%</strong>
          <span>Verified Chauffeurs</span>
        </div>
        <div class="stat-item">
          <strong>24/7</strong>
          <span>Customer Support</span>
        </div>
        <div class="stat-item">
          <strong>Top Rated</strong>
          <span>In Durgapura, Jaipur</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Brief Section -->
<section class="section-padding">
  <div class="container">
    <div class="about-grid">
      <div>
        <span class="section-tag">About Virtual Travel Planner</span>
        <h2 class="section-title">Your Trusted Local Travel Partner in Jaipur</h2>
        <p>
          Established in <strong>Durgapura, Jaipur</strong>, Virtual Travel Planner is dedicated to providing high-quality, punctual, and safe car rental experiences for residents, tourists, and business professionals.
        </p>
        <p>
          Whether you need a compact hatchback for navigating vibrant city bazaars, a comfortable sedan for family visits, an SUV for adventurous desert road trips, or an executive car for corporate delegations, we have an extensive fleet ready to serve you.
        </p>
        <div class="about-highlights">
          <div class="highlight-card">
            <h4>No Hidden Costs</h4>
            <p>Transparent per-km and fixed-package rates with zero surge pricing surprises.</p>
          </div>
          <div class="highlight-card">
            <h4>Experienced Drivers</h4>
            <p>Polite, background-verified drivers with deep knowledge of Jaipur and Rajasthan routes.</p>
          </div>
        </div>
        <div style="margin-top: 1.75rem;">
          <a href="about.php" class="btn btn-outline">Read More About Us ➔</a>
        </div>
      </div>

      <div style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); border-radius: var(--radius-md); padding: 2.5rem; color: #ffffff; box-shadow: var(--shadow-md);">
        <h3 style="color: #ffffff; margin-bottom: 1rem; font-size: 1.5rem;">Why Choose Us?</h3>
        <ul style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.95rem;">
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <span style="font-size: 1.2rem;">⏱️</span>
            <div><strong>Punctual Pickups:</strong> On-time arrivals at Jaipur Airport, Railway Stations, and hotel doorsteps.</div>
          </li>
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <span style="font-size: 1.2rem;">🧼</span>
            <div><strong>Sanitized & Clean Fleet:</strong> Thoroughly inspected, clean AC vehicles for every trip.</div>
          </li>
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <span style="font-size: 1.2rem;">🛡️</span>
            <div><strong>Safe & Secure:</strong> GPS-equipped fleet with emergency protocols and verified staff.</div>
          </li>
          <li style="display: flex; gap: 0.75rem; align-items: flex-start;">
            <span style="font-size: 1.2rem;">📍</span>
            <div><strong>Local Expertise:</strong> Located right at Tonk Road, Durgapura, Jaipur with instant local dispatch.</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Services Preview Section -->
<section class="section-padding section-alt">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">What We Offer</span>
      <h2 class="section-title">Our Car Rental Services</h2>
      <p class="section-subtitle">Tailored vehicle rental packages to meet every travel requirement with comfort and reliability.</p>
    </div>

    <div class="services-grid">
      <!-- Service 1: Local Car Rental -->
      <div class="service-card">
        <div class="service-icon">🏙️</div>
        <h3 class="service-title">Local Car Rental</h3>
        <p class="service-desc">
          Flexible 4-hour, 8-hour, and full-day packages for local city sightseeing, shopping, weddings, or family visits in Jaipur.
        </p>
        <ul class="service-features">
          <li>Amer Fort, Hawa Mahal & City Palace</li>
          <li>Flexible hourly extensions</li>
          <li>Fuel and chauffeur included</li>
        </ul>
        <a href="contact.php" class="btn btn-outline btn-block">Book Local Ride</a>
      </div>

      <!-- Service 2: Outstation Trips -->
      <div class="service-card">
        <div class="service-icon">🛣️</div>
        <h3 class="service-title">Outstation Trips</h3>
        <p class="service-desc">
          Safe and comfortable one-way or round-trip journeys from Jaipur to Delhi, Agra, Udaipur, Jodhpur, Pushkar, and beyond.
        </p>
        <ul class="service-features">
          <li>All-India tourist permit cabs</li>
          <li>Doorstep pickup & drop</li>
          <li>Night travel assistance</li>
        </ul>
        <a href="contact.php" class="btn btn-outline btn-block">Book Outstation</a>
      </div>

      <!-- Service 3: Airport Pickup & Drop -->
      <div class="service-card">
        <div class="service-icon">✈️</div>
        <h3 class="service-title">Airport Pickup & Drop</h3>
        <p class="service-desc">
          Punctual transfers to and from Jaipur International Airport (JAI) and Durgapura Railway Station with flight tracking.
        </p>
        <ul class="service-features">
          <li>Flight delay tracking</li>
          <li>Luggage assistance</li>
          <li>Zero waiting surge charges</li>
        </ul>
        <a href="contact.php" class="btn btn-outline btn-block">Book Airport Ride</a>
      </div>

      <!-- Service 4: Corporate Rentals -->
      <div class="service-card">
        <div class="service-icon">💼</div>
        <h3 class="service-title">Corporate Rentals</h3>
        <p class="service-desc">
          Executive sedans and luxury SUVs for corporate delegates, VIP guests, company events, and daily employee transport.
        </p>
        <ul class="service-features">
          <li>Monthly GST invoicing</li>
          <li>Dedicated fleet coordinators</li>
          <li>Premium luxury vehicle fleet</li>
        </ul>
        <a href="contact.php" class="btn btn-outline btn-block">Book Corporate</a>
      </div>
    </div>

    <div style="text-align: center; margin-top: 2.5rem;">
      <a href="services.php" class="btn btn-primary">View Detailed Service Information ➔</a>
    </div>
  </div>
</section>

<!-- Client Testimonials Section -->
<section class="section-padding">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">Client Reviews</span>
      <h2 class="section-title">What Our Travelers Say</h2>
      <p class="section-subtitle">Real experiences from tourists, business executives, and local residents who trust our car rentals.</p>
    </div>

    <div class="reviews-grid">
      <div class="review-card">
        <div class="review-stars">★★★★★</div>
        <p class="review-text">
          "Hired an Innova for a 3-day family tour across Jaipur, Ajmer, and Pushkar. The cab arrived right on time at our hotel in Durgapura. The driver was courteous and knew all the scenic spots. Highly recommended!"
        </p>
        <div class="reviewer">
          <div class="reviewer-avatar">RK</div>
          <div class="reviewer-meta">
            <strong>Rajesh Khandelwal</strong>
            <span>Family Tourist (Delhi)</span>
          </div>
        </div>
      </div>

      <div class="review-card">
        <div class="review-stars">★★★★★</div>
        <p class="review-text">
          "Virtual Travel Planner provided corporate cab services for our 4-day conference in Jaipur. Impeccable timing, clean sedans, and GST compliant invoicing. They made our executive transport hassle-free."
        </p>
        <div class="reviewer">
          <div class="reviewer-avatar">PS</div>
          <div class="reviewer-meta">
            <strong>Pooja Sharma</strong>
            <span>Event Coordinator (Jaipur)</span>
          </div>
        </div>
      </div>

      <div class="review-card">
        <div class="review-stars">★★★★★</div>
        <p class="review-text">
          "Booked an airport drop at 4:30 AM from Durgapura to Jaipur Airport. The chauffeur was waiting 15 minutes before time. Smooth ride and stress-free transfer. Will definitely use their service again."
        </p>
        <div class="reviewer">
          <div class="reviewer-avatar">AM</div>
          <div class="reviewer-meta">
            <strong>Amit Mathur</strong>
            <span>Frequent Flyer (Jaipur)</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Banner -->
<section class="section-padding" style="background: linear-gradient(135deg, #1d4ed8 0%, #1e3a8a 100%); color: #ffffff; text-align: center;">
  <div class="container">
    <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">Ready for a Smooth & Safe Ride?</h2>
    <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto 2rem; font-size: 1.1rem;">
      Get an instant custom quote for your upcoming local, outstation, or airport journey. Our team will contact you promptly with the best pricing.
    </p>
    <a href="contact.php" class="btn btn-primary" style="background-color: #ffffff; color: var(--primary-dark); font-size: 1.1rem; padding: 0.9rem 2rem;">
      Request Your Free Quote Now
    </a>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
