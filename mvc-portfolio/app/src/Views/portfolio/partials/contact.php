<section id="contact" class="contact section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Messages sent from this form are stored in the <code>contact_messages</code> table.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-5">

        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Location</h3>
              <p><?= htmlspecialchars((string) $profile['address']) ?></p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Phone</h3>
              <p><?= htmlspecialchars((string) $profile['phone']) ?></p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p><?= htmlspecialchars((string) $profile['email']) ?></p>
            </div>
          </div>
          <?php if ($profile['latitude'] !== null && $profile['longitude'] !== null): ?>
            <?php
              $lat = (float) $profile['latitude'];
              $lon = (float) $profile['longitude'];
              $span = (float) $profile['map_span'];
              $bbox = implode(',', [$lon - $span, $lat - $span / 2, $lon + $span, $lat + $span / 2]);
              $mapUrl = 'https://www.openstreetmap.org/export/embed.html?bbox=' . rawurlencode($bbox)
                  . '&layer=mapnik&marker=' . rawurlencode($lat . ',' . $lon);
            ?>
            <iframe
              src="<?= htmlspecialchars($mapUrl) ?>"
              title="Map of <?= htmlspecialchars((string) $profile['city']) ?>"
              style="border:0; width: 100%; height: 270px;"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-lg-7">
        <form action="/contact" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">

            <div class="col-md-6">
              <label for="name-field" class="pb-2">Your name</label>
              <input type="text" name="name" id="name-field" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label for="email-field" class="pb-2">Your email</label>
              <input type="email" class="form-control" name="email" id="email-field" required>
            </div>

            <div class="col-md-12">
              <label for="subject-field" class="pb-2">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject-field" required>
            </div>

            <div class="col-md-12">
              <label for="message-field" class="pb-2">Message</label>
              <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been saved. Thank you!</div>

              <button type="submit">Send message</button>
            </div>

          </div>
        </form>
      </div>

    </div>

  </div>

</section>
