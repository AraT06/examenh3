<section id="stats" class="stats section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">
      <?php foreach ($stats as $stat): ?>
        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="<?= htmlspecialchars($stat['icon']) ?>"></i>
            <span data-purecounter-start="0" data-purecounter-end="<?= (int) $stat['value'] ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong><?= htmlspecialchars($stat['label']) ?></strong> <span><?= htmlspecialchars((string) $stat['caption']) ?></span></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

</section>
