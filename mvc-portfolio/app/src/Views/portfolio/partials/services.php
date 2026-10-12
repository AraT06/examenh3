<section id="services" class="services section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Services</h2>
    <p>What I can bring to a team or to a project of my own right now.</p>
  </div>

  <div class="container">

    <div class="row gy-4">
      <?php foreach ($services as $i => $service): ?>
        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="<?= 100 * ($i + 1) ?>">
          <div class="icon flex-shrink-0"><i class="<?= htmlspecialchars($service['icon']) ?>"></i></div>
          <div>
            <h4 class="title"><?= htmlspecialchars($service['title']) ?></h4>
            <p class="description"><?= htmlspecialchars($service['description']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

</section>
