<?php
/**
 * Contact & Quote Request Page
 * Virtual Travel Planner - Car Rental Website
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = 'Get a Quote | Virtual Travel Planner - Car Rentals in Jaipur';
$currentPage = 'contact.php';

// Flash messages from submit_quote.php
$successMessage = isset($_SESSION['flash_success']) ? $_SESSION['flash_success'] : null;
$errors = isset($_SESSION['flash_errors']) ? $_SESSION['flash_errors'] : [];
$old = isset($_SESSION['old_input']) ? $_SESSION['old_input'] : [];

// Clear flash data once consumed
unset($_SESSION['flash_success'], $_SESSION['flash_errors'], $_SESSION['old_input']);

// Query parameter pre-selection for service type (fallback if no old input)
$preselectedService = isset($_GET['service']) ? trim($_GET['service']) : '';

// Service dropdown options
$services = [
    'Local Car Rental'       => 'Local Car Rental (Jaipur City Sightseeing)',
    'Outstation Trips'      => 'Outstation Trips (Rajasthan & Intercity)',
    'Airport Pickup & Drop'  => 'Airport Pickup & Drop (Jaipur Airport / Station)',
    'Corporate Rentals'     => 'Corporate Rentals (Executive & Luxury Fleets)',
];

include_once __DIR__ . '/includes/header.php';
?>

<!-- Inner Hero Banner -->
<section style="background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); color: #ffffff; padding: 3rem 0; text-align: center;">
  <div class="container">
    <span class="section-tag" style="background-color: rgba(255,255,255,0.15); color: #93c5fd;">Get In Touch</span>
    <h1 style="color: #ffffff; margin-top: 0.5rem; margin-bottom: 0.75rem;">Request a Car Rental Quote</h1>
    <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto;">
      Fill out the form below to receive competitive rates and personalized vehicle rental options in Durgapura, Jaipur.
    </p>
  </div>
</section>

<!-- Contact & Quote Form Section -->
<section class="section-padding">
  <div class="container">
    <div class="contact-layout">

      <!-- Form Card -->
      <div class="form-card">
        <h2 style="font-size: 1.5rem; margin-bottom: 0.5rem;">Book Your Journey</h2>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 1.5rem;">
          Fields marked with <span class="required-star">*</span> are mandatory.
        </p>

        <!-- Flash Success Notification -->
        <?php if ($successMessage): ?>
          <div class="alert alert-success" role="alert">
            <span class="alert-icon">✓</span>
            <div class="alert-body">
              <strong>Success!</strong>
              <p style="margin: 0.25rem 0 0;"><?php echo htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
          </div>
        <?php endif; ?>

        <!-- Flash Error Notification -->
        <?php if (!empty($errors)): ?>
          <div class="alert alert-error" role="alert">
            <span class="alert-icon">⚠️</span>
            <div class="alert-body">
              <strong>Please correct the following errors:</strong>
              <ul>
                <?php foreach ($errors as $field => $errMsg): ?>
                  <li><?php echo htmlspecialchars($errMsg, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>

        <form action="submit_quote.php" method="POST" id="quoteForm" novalidate>
          <!-- Full Name -->
          <div class="form-group">
            <label for="name">
              Full Name <span class="required-star">*</span>
            </label>
            <input
              type="text"
              name="name"
              id="name"
              class="form-control <?php echo isset($errors['name']) ? 'has-error' : ''; ?>"
              placeholder="e.g. Ramesh Chandra"
              maxlength="100"
              required
              value="<?php echo isset($old['name']) ? htmlspecialchars($old['name'], ENT_QUOTES, 'UTF-8') : ''; ?>"
            >
            <?php if (isset($errors['name'])): ?>
              <span class="field-error"><?php echo htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8'); ?></span>
            <?php endif; ?>
          </div>

          <!-- Phone & Email (2 columns) -->
          <div class="form-row">
            <div class="form-group">
              <label for="phone">
                Phone Number <span class="required-star">*</span>
              </label>
              <input
                type="tel"
                name="phone"
                id="phone"
                class="form-control <?php echo isset($errors['phone']) ? 'has-error' : ''; ?>"
                placeholder="10-digit mobile number"
                maxlength="15"
                required
                value="<?php echo isset($old['phone']) ? htmlspecialchars($old['phone'], ENT_QUOTES, 'UTF-8') : ''; ?>"
              >
              <?php if (isset($errors['phone'])): ?>
                <span class="field-error"><?php echo htmlspecialchars($errors['phone'], ENT_QUOTES, 'UTF-8'); ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="email">
                Email Address <span style="color: var(--text-muted); font-weight: normal;">(Optional)</span>
              </label>
              <input
                type="email"
                name="email"
                id="email"
                class="form-control <?php echo isset($errors['email']) ? 'has-error' : ''; ?>"
                placeholder="name@example.com"
                maxlength="100"
                value="<?php echo isset($old['email']) ? htmlspecialchars($old['email'], ENT_QUOTES, 'UTF-8') : ''; ?>"
              >
              <?php if (isset($errors['email'])): ?>
                <span class="field-error"><?php echo htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8'); ?></span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Service Type & Pickup Date (2 columns) -->
          <div class="form-row">
            <div class="form-group">
              <label for="service_type">
                Service Type <span class="required-star">*</span>
              </label>
              <select
                name="service_type"
                id="service_type"
                class="form-control <?php echo isset($errors['service_type']) ? 'has-error' : ''; ?>"
                required
              >
                <option value="">-- Choose a Service --</option>
                <?php
                $currentService = isset($old['service_type']) ? $old['service_type'] : $preselectedService;
                foreach ($services as $val => $label):
                    $selected = ($currentService === $val) ? 'selected' : '';
                ?>
                  <option value="<?php echo htmlspecialchars($val, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $selected; ?>>
                    <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <?php if (isset($errors['service_type'])): ?>
                <span class="field-error"><?php echo htmlspecialchars($errors['service_type'], ENT_QUOTES, 'UTF-8'); ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="pickup_date">
                Pickup Date <span style="color: var(--text-muted); font-weight: normal;">(Optional)</span>
              </label>
              <input
                type="date"
                name="pickup_date"
                id="pickup_date"
                class="form-control <?php echo isset($errors['pickup_date']) ? 'has-error' : ''; ?>"
                value="<?php echo isset($old['pickup_date']) ? htmlspecialchars($old['pickup_date'], ENT_QUOTES, 'UTF-8') : ''; ?>"
              >
              <?php if (isset($errors['pickup_date'])): ?>
                <span class="field-error"><?php echo htmlspecialchars($errors['pickup_date'], ENT_QUOTES, 'UTF-8'); ?></span>
              <?php endif; ?>
            </div>
          </div>

          <!-- Message -->
          <div class="form-group">
            <label for="message">
              Trip Details & Message <span style="color: var(--text-muted); font-weight: normal;">(Optional)</span>
            </label>
            <textarea
              name="message"
              id="message"
              class="form-control"
              placeholder="Provide destination details, preferred vehicle (e.g., Sedan, SUV, Innova), number of passengers, or any special requests..."
            ><?php echo isset($old['message']) ? htmlspecialchars($old['message'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary btn-block" style="font-size: 1.05rem; padding: 0.85rem;">
            Submit Quote Request ➔
          </button>
        </form>
      </div>

      <!-- Contact Info Sidebar -->
      <div>
        <div class="contact-info-card">
          <h3 style="margin-bottom: 1.5rem;">Reach Out Directly</h3>

          <div class="info-item">
            <div class="info-icon">📍</div>
            <div class="info-content">
              <h4>Head Office Location</h4>
              <p>Plot No. 42, Near Durgapura Flyover,<br>Tonk Road, Durgapura, Jaipur,<br>Rajasthan – 302018</p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon">📞</div>
            <div class="info-content">
              <h4>Direct Call & WhatsApp</h4>
              <p><a href="tel:+919876543210">+91 98765 43210</a></p>
              <p><a href="tel:+911412550100">+91 (0141) 2550100</a></p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon">✉️</div>
            <div class="info-content">
              <h4>Email Inquiries</h4>
              <p><a href="mailto:info@virtualtravelplanner.com">info@virtualtravelplanner.com</a></p>
              <p><a href="mailto:quotes@virtualtravelplanner.com">quotes@virtualtravelplanner.com</a></p>
            </div>
          </div>

          <div class="info-item">
            <div class="info-icon">⏰</div>
            <div class="info-content">
              <h4>Operating Hours</h4>
              <p>Office Desk: 8:00 AM – 9:00 PM<br>Fleet Dispatch & Cab Service: <strong>24 Hours / 7 Days</strong></p>
            </div>
          </div>
        </div>

        <div style="background-color: var(--primary-subtle); border: 1px solid #bfdbfe; border-radius: var(--radius-md); padding: 1.5rem; margin-top: 1.5rem;">
          <h4 style="color: var(--primary-dark); margin-bottom: 0.5rem;">Fast Response Guarantee</h4>
          <p style="font-size: 0.9rem; color: #1e3a8a; margin-bottom: 0;">
            Our customer reservation coordinators usually review and respond to online quote requests within <strong>15–30 minutes</strong> during business hours.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
