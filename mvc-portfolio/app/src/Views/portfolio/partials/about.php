<section id="about" class="about section">

  <div class="container section-title" data-aos="fade-up">
    <h2>About</h2>
    <p><?= htmlspecialchars($profile['about_intro']) ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 justify-content-center">
      <div class="col-lg-4">
        <img src="<?= $asset($profile['avatar_path']) ?>" class="img-fluid" alt="<?= htmlspecialchars($profile['full_name']) ?>">
      </div>
      <div class="col-lg-8 content">
        <h2><?= htmlspecialchars($profile['headline']) ?></h2>
        <p class="fst-italic py-3">
          <?= nl2br(htmlspecialchars($profile['about_summary'])) ?>
        </p>
        <div class="row">
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?= $profile['birth_date'] ? date('j F Y', strtotime($profile['birth_date'])) : '' ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?= htmlspecialchars((string) $profile['website']) ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?= htmlspecialchars((string) $profile['phone']) ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?= htmlspecialchars((string) $profile['city']) ?></span></li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul>
              <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?= htmlspecialchars((string) $profile['age']) ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?= htmlspecialchars((string) $profile['degree']) ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?= htmlspecialchars((string) $profile['email']) ?></span></li>
              <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?= htmlspecialchars((string) $profile['freelance']) ?></span></li>
            </ul>
          </div>
        </div>
        <p class="py-3">
          <?= nl2br(htmlspecialchars($profile['about_extra'])) ?>
        </p>
      </div>
    </div>

  </div>

</section>
