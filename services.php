<?php
/**
 * Services Page
 * Virtual Travel Planner - Car Rental Website
 */
$pageTitle = 'Our Car Rental Services | Virtual Travel Planner Jaipur';
$currentPage = 'services.php';
include_once __DIR__ . '/includes/header.php';
?>

<!-- Inner Hero Banner -->
<section style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); color: #ffffff; padding: 3rem 0; text-align: center;">
  <div class="container">
    <span class="section-tag" style="background-color: rgba(255,255,255,0.15); color: #93c5fd;">Comprehensive Travel Solutions</span>
    <h1 style="color: #ffffff; margin-top: 0.5rem; margin-bottom: 0.75rem;">Our Car Rental Services</h1>
    <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto;">
      From local city commutes to grand Rajasthan road trips, we offer reliable, flexible, and affordable car hire packages.
    </p>
  </div>
</section>

<!-- Detailed Services Section -->
<section class="section-padding">
  <div class="container">
    <div style="display: flex; flex-direction: column; gap: 3rem;">

      <!-- Service 1: Local Car Rental -->
      <div style="background-color: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <div class="service-icon" style="margin-bottom: 0;">🏙️</div>
          <div>
            <span class="section-tag" style="margin-bottom: 0.25rem;">City Travel</span>
            <h2>Local Car Rental in Jaipur</h2>
          </div>
        </div>
        <p>
          Discover Jaipur at your own pace without the hassle of negotiating with autos or hailing multiple cabs. Our local car rental service is ideal for sightseeing, family visits, shopping expeditions in Johari Bazaar and Bapu Bazaar, or attending weddings and events.
        </p>
        <div class="about-highlights" style="margin-bottom: 1.75rem;">
          <div class="highlight-card">
            <h4>Available Packages</h4>
            <p>4 Hours / 40 Kms • 8 Hours / 80 Kms • 12 Hours / 120 Kms • Full Day Sightseeing Packages</p>
          </div>
          <div class="highlight-card">
            <h4>Covered Highlights</h4>
            <p>Amber Fort, Nahargarh, Jal Mahal, City Palace, Hawa Mahal, Jantar Mantar, Birla Mandir & Albert Hall.</p>
          </div>
        </div>
        <a href="contact.php?service=Local+Car+Rental" class="btn btn-primary">Book Local Car Rental ➔</a>
      </div>

      <!-- Service 2: Outstation Trips -->
      <div style="background-color: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <div class="service-icon" style="margin-bottom: 0;">🛣️</div>
          <div>
            <span class="section-tag" style="margin-bottom: 0.25rem;">Inter-City Journeys</span>
            <h2>Outstation Trips & Rajasthan Tours</h2>
          </div>
        </div>
        <p>
          Planning an intercity trip from Jaipur? Our outstation service offers one-way drops as well as round-trip multi-day packages. Enjoy the scenic highways of Rajasthan and Northern India in complete comfort with experienced drivers who know highway pit-stops, toll passes, and local terrain.
        </p>
        <div class="about-highlights" style="margin-bottom: 1.75rem;">
          <div class="highlight-card">
            <h4>Popular Routes</h4>
            <p>Jaipur to Delhi NCR • Jaipur to Agra (Golden Triangle) • Jaipur to Udaipur & Jodhpur • Jaipur to Pushkar & Ajmer</p>
          </div>
          <div class="highlight-card">
            <h4>Service Inclusions</h4>
            <p>Well-rested highway drivers, commercial All-India tourist permit, clean air-conditioned vehicles, and transparent per-km billing.</p>
          </div>
        </div>
        <a href="contact.php?service=Outstation+Trips" class="btn btn-primary">Book Outstation Trip ➔</a>
      </div>

      <!-- Service 3: Airport Pickup & Drop -->
      <div style="background-color: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <div class="service-icon" style="margin-bottom: 0;">✈️</div>
          <div>
            <span class="section-tag" style="margin-bottom: 0.25rem;">Punctual Transfers</span>
            <h2>Airport & Railway Station Pickup & Drop</h2>
          </div>
        </div>
        <p>
          Never stress about missing a flight or train again. Located near Tonk Road in Durgapura, we provide lightning-fast, guaranteed on-time pickups and drops for Jaipur International Airport (Terminal 1 & Terminal 2) and Durgapura / Jaipur Junction Railway Stations.
        </p>
        <div class="about-highlights" style="margin-bottom: 1.75rem;">
          <div class="highlight-card">
            <h4>Transfer Benefits</h4>
            <p>Flight delay monitoring, luggage handling assistance, meet-and-greet service at terminal arrival gates.</p>
          </div>
          <div class="highlight-card">
            <h4>24x7 Schedule</h4>
            <p>Late night and early morning arrivals are served without surge multipliers or driver cancellations.</p>
          </div>
        </div>
        <a href="contact.php?service=Airport+Pickup+%26+Drop" class="btn btn-primary">Book Airport Transfer ➔</a>
      </div>

      <!-- Service 4: Corporate Rentals -->
      <div style="background-color: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow-sm);">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
          <div class="service-icon" style="margin-bottom: 0;">💼</div>
          <div>
            <span class="section-tag" style="margin-bottom: 0.25rem;">Business Travel</span>
            <h2>Corporate Rentals & Fleet Solutions</h2>
          </div>
        </div>
        <p>
          Empower your enterprise with reliable corporate transport solutions. We partner with companies, hotels, travel agencies, and event organizers across Jaipur to provide executive travel, employee commuter cabs, and high-profile VIP convoys.
        </p>
        <div class="about-highlights" style="margin-bottom: 1.75rem;">
          <div class="highlight-card">
            <h4>Corporate Advantages</h4>
            <p>Detailed monthly GST invoicing, designated account manager, flexible credit periods, and priority booking status.</p>
          </div>
          <div class="highlight-card">
            <h4>Fleet Options</h4>
            <p>Premium sedans (Dzire, Ciaz), luxury cars (Camry, BMW, Audi), and executive MUVs (Innova Crysta, Hycross).</p>
          </div>
        </div>
        <a href="contact.php?service=Corporate+Rentals" class="btn btn-primary">Book Corporate Fleet ➔</a>
      </div>

    </div>
  </div>
</section>

<!-- Call to action -->
<section class="section-padding section-alt" style="text-align: center;">
  <div class="container">
    <h2 style="margin-bottom: 1rem;">Need a Custom Itinerary?</h2>
    <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto 1.75rem;">
      Whether it is a one-week tour of Rajasthan or a special event requirement, we customize car rental packages to fit your exact budget and itinerary.
    </p>
    <a href="contact.php" class="btn btn-primary" style="font-size: 1.05rem;">Request a Free Custom Quote ➔</a>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
