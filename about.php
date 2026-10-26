<?php
/**
 * About Us Page
 * Virtual Travel Planner - Car Rental Website
 */
$pageTitle = 'About Us | Virtual Travel Planner - Car Rentals in Jaipur';
$currentPage = 'about.php';
include_once __DIR__ . '/includes/header.php';
?>

<!-- Inner Hero Banner -->
<section style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); color: #ffffff; padding: 3rem 0; text-align: center;">
  <div class="container">
    <span class="section-tag" style="background-color: rgba(255,255,255,0.15); color: #93c5fd;">Who We Are</span>
    <h1 style="color: #ffffff; margin-top: 0.5rem; margin-bottom: 0.75rem;">About Virtual Travel Planner</h1>
    <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto;">
      Delivering reliable, comfortable, and affordable car rental solutions across Jaipur and Rajasthan from our base in Durgapura.
    </p>
  </div>
</section>

<!-- Company Story Section -->
<section class="section-padding">
  <div class="container">
    <div class="about-grid">
      <div>
        <span class="section-tag">Our Roots</span>
        <h2 class="section-title">Serving Jaipur with Pride & Professionalism</h2>
        <p>
          Founded in the heart of <strong>Durgapura, Jaipur</strong>, Virtual Travel Planner started with a single goal: to simplify transportation for travelers who value punctuality, clean cars, and honest pricing. Over the years, we have grown into one of the most trusted car rental services in the region.
        </p>
        <p>
          Located near major transit hubs including the Durgapura Railway Station and Jaipur International Airport, our central location allows us to deploy vehicles rapidly across Malviya Nagar, Mansarovar, Tonk Road, C-Scheme, Vaishali Nagar, and surrounding Jaipur localities.
        </p>
        <p>
          Whether you are a solo traveler needing an airport transfer, a family touring the majestic forts of Rajasthan, or a company managing corporate delegates, our fleet and customer support team work around the clock to guarantee a seamless journey.
        </p>
      </div>

      <div style="background-color: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 2.25rem; box-shadow: var(--shadow-sm);">
        <h3 style="margin-bottom: 1.25rem;">Our Core Commitments</h3>
        <div style="display: flex; flex-direction: column; gap: 1.25rem;">
          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 36px; height: 36px; background: var(--primary-subtle); color: var(--primary); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0;">1</div>
            <div>
              <h4 style="font-size: 1rem; margin-bottom: 0.2rem;">Complete Transparency</h4>
              <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0;">No surprise tolls or hidden night charges. What you are quoted is what you pay.</p>
            </div>
          </div>

          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 36px; height: 36px; background: var(--primary-subtle); color: var(--primary); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0;">2</div>
            <div>
              <h4 style="font-size: 1rem; margin-bottom: 0.2rem;">Driver Verification & Courtesy</h4>
              <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0;">Every chauffeur undergoes strict background checks, route exams, and etiquette training.</p>
            </div>
          </div>

          <div style="display: flex; gap: 1rem; align-items: flex-start;">
            <div style="width: 36px; height: 36px; background: var(--primary-subtle); color: var(--primary); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-weight: bold; flex-shrink: 0;">3</div>
            <div>
              <h4 style="font-size: 1rem; margin-bottom: 0.2rem;">Pristine Vehicle Hygiene</h4>
              <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0;">Cars are sanitized, vacuumed, and mechanically checked before every departure.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Fleet Standards Section -->
<section class="section-padding section-alt">
  <div class="container">
    <div class="section-header">
      <span class="section-tag">Modern & Maintained</span>
      <h2 class="section-title">Our Diverse Vehicle Fleet</h2>
      <p class="section-subtitle">We maintain a wide range of modern vehicles suited for every group size and budget.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
      <div class="highlight-card">
        <h4 style="color: var(--primary);">Economy Hatchbacks</h4>
        <p><strong>Models:</strong> Maruti WagonR, Swift</p>
        <p>Perfect for solo travelers and couples navigating city traffic with maximum fuel economy.</p>
      </div>

      <div class="highlight-card">
        <h4 style="color: var(--primary);">Comfort Sedans</h4>
        <p><strong>Models:</strong> Maruti Dzire, Honda Amaze</p>
        <p>Spacious boots and plush legroom for airport transfers and outstation business meetings.</p>
      </div>

      <div class="highlight-card">
        <h4 style="color: var(--primary);">Family SUVs & MUVs</h4>
        <p><strong>Models:</strong> Toyota Innova Crysta, Maruti Ertiga</p>
        <p>The gold standard for multi-day Rajasthan road trips with comfortable seating for 6-7 passengers.</p>
      </div>

      <div class="highlight-card">
        <h4 style="color: var(--primary);">Executive & Luxury</h4>
        <p><strong>Models:</strong> Toyota Camry, Mercedes, Fortuner</p>
        <p>Premium vehicles for corporate VIP transport, delegations, and destination weddings.</p>
      </div>
    </div>
  </div>
</section>

<!-- Call to action -->
<section class="section-padding" style="text-align: center;">
  <div class="container">
    <h2 style="margin-bottom: 1rem;">Experience the Difference with Us</h2>
    <p style="color: var(--text-muted); max-width: 550px; margin: 0 auto 1.75rem;">
      Ready to book your next trip or want a customized travel package? Send us your requirement and our booking coordinator will assist you right away.
    </p>
    <a href="contact.php" class="btn btn-primary" style="font-size: 1.05rem;">Request a Rental Quote ➔</a>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
