<?php
/* Template Name: Trails Test Page */
get_header();
?>

<!-- A3: Sticky Top CTA Bar (WhatsApp & LINE, Bold) -->
<div class="trails-sticky-cta">
    <a href="https://wa.me/" target="_blank" rel="noopener noreferrer" class="cta-btn cta-whatsapp">WhatsApp</a>
    <a href="https://line.me/" target="_blank" rel="noopener noreferrer" class="cta-btn cta-line">LINE</a>
</div>

<header class="site-header-trails">
    <h1>Hiking Adventures</h1>
    <p>Find your next trail with MyRehat</p>
    <input id="main-search" type="text" placeholder="Search homepage...">
</header>

<div class="trails-promo">
    <strong>Limited offer:</strong> 20% off all guided hikes this month.
</div>

<main class="trails-main">
    <div class="trails-search-row">
        <input id="search-box" type="text" placeholder="Search trails...">
        <select id="category">
            <option value="all">All categories</option>
            <option value="mountain">Mountain</option>
            <option value="beach">Beach</option>
            <option value="forest">Forest</option>
        </select>
    </div>
    <p id="trails-no-results" hidden>No trails found.</p>

    <div class="trails-cards">
        <article class="trail-card" data-category="mountain">
            <h3>Mount Rinjani Sunrise</h3>
            <p>2-day guided summit trek, Lombok.</p>
            <span class="price">RM 350 / pax</span>
        </article>
        <article class="trail-card" data-category="beach">
            <h3>Pulau Perhentian Coastal Walk</h3>
            <p>Easy coastal trail, Terengganu.</p>
            <span class="price">RM 120 / pax</span>
        </article>
        <article class="trail-card" data-category="forest">
            <h3>Taman Negara Canopy Trail</h3>
            <p>Rainforest walk, Pahang.</p>
            <span class="price">RM 180 / pax</span>
        </article>
        <article class="trail-card" data-category="mountain">
            <h3>Mount Kinabalu Base Trek</h3>
            <p>Highland trek, Sabah.</p>
            <span class="price">RM 420 / pax</span>
        </article>
        <article class="trail-card" data-category="beach">
            <h3>Langkawi Sunset Ridge</h3>
            <p>Evening ridge walk, Kedah.</p>
            <span class="price">RM 95 / pax</span>
        </article>
        <article class="trail-card" data-category="forest">
            <h3>Belum Mossy Forest</h3>
            <p>Misty forest trail, Perak.</p>
            <span class="price">RM 150 / pax</span>
        </article>
    </div>

    <section class="trails-booking">
        <h2><?php echo esc_html( myrehat_test_booking_title() ); ?></h2>
        
        <form id="booking-form">
            <input type="hidden" name="trails_booking" value="1">
            <?php wp_nonce_field( 'trails_booking_action', 'trails_booking_nonce' ); ?>

            <p>
                <label for="booking-name">Name <span class="required">*</span></label><br>
                <input type="text" id="booking-name" name="name" required style="width: 100%; max-width: 420px; box-sizing: border-box; padding: 8px;">
            </p>

            <p>
                <label for="booking-date">Date <span class="required">*</span></label><br>
                <input type="date" id="booking-date" name="date" required style="width: 100%; max-width: 420px; box-sizing: border-box; padding: 8px;">
            </p>

            <!-- A11: Daily / Monthly Plan Selection -->
            <fieldset style="margin-bottom: 1em; border: 1px solid #ccc; padding: 12px; border-radius: 4px; max-width: 420px; box-sizing: border-box;">
                <legend style="font-weight: 600;">Plan Duration <span class="required">*</span></legend>
                <label style="margin-right: 15px; cursor: pointer; display: inline-block;">
                    <input type="radio" name="plan_type" value="daily" required> Daily (RM 350)
                </label>
                <label style="cursor: pointer; display: inline-block;">
                    <input type="radio" name="plan_type" value="monthly" required> Monthly (RM 8,400)
                </label>
            </fieldset>

            <!-- A6: Digital Nomad Selection -->
            <fieldset style="margin-bottom: 1em; border: 1px solid #ccc; padding: 12px; border-radius: 4px; max-width: 420px; box-sizing: border-box;">
                <legend style="font-weight: 600;">Digital Nomad? <span class="required">*</span></legend>
                <label style="margin-right: 15px; cursor: pointer; display: inline-block;">
                    <input type="radio" name="digital_nomad" value="yes" required> Ya
                </label>
                <label style="cursor: pointer; display: inline-block;">
                    <input type="radio" name="digital_nomad" value="no" required> Tidak
                </label>
            </fieldset>

            <!-- A9: Host Terms Checkbox -->
            <p style="margin-bottom: 1.2em;">
                <label style="cursor: pointer;">
                    <input type="checkbox" id="host-terms" name="host_terms" required>
                    I agree to the Host Terms <span class="required">*</span>
                </label>
            </p>

            <!-- Price Display -->
            <p id="booking-total-wrap" style="font-size: 1.15em; font-weight: bold; margin: 15px 0;">
                Total: <span id="booking-total">-</span>
            </p>

            <button type="submit" class="button" style="padding: 10px 20px; font-weight: bold; cursor: pointer;">Request booking</button>

            <!-- A12: Confirmation Message -->
            <div id="booking-confirmation" style="display:none; margin-top: 15px; padding: 14px; background: #e6f7ec; border: 1px solid #28a745; color: #155724; border-radius: 4px; font-weight: 600; max-width: 420px; box-sizing: border-box;">
                Booking request received! Your booking has been confirmed.
            </div>
        </form>
    </section>
</main>

<!-- A4 & A8: Clean Custom Footer -->
<footer class="trails-footer">
    <!-- A4: ONLY FAQ, Contact Us, PDPA, Privacy Policy -->
    <nav class="footer-links">
        <a href="#faq">FAQ</a>
        <a href="#contact">Contact Us</a>
        <a href="#pdpa">PDPA</a>
        <a href="#privacy">Privacy Policy</a>
    </nav>

    <!-- A8: Facebook, LinkedIn, Instagram, TikTok, YouTube -->
    <div class="footer-socials">
        <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook">Facebook</a>
        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">LinkedIn</a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram">Instagram</a>
        <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" aria-label="TikTok">TikTok</a>
        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube">YouTube</a>
    </div>

    <p style="margin-top: 14px; font-size: 13px; color: #888;">&copy; <?php echo date('Y'); ?> Tropic Hiking Trails. All rights reserved.</p>
</footer>

<?php
get_footer();
