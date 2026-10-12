<section id="portfolio" class="portfolio section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolio</h2>
    <p>Coursework and personal projects. The filters come from the categories stored in the table.</p>
  </div>

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <?php foreach ($portfolioCategories as $category): ?>
          <li data-filter=".filter-<?= htmlspecialchars($category) ?>"><?= htmlspecialchars(ucfirst($category)) ?></li>
        <?php endforeach; ?>
      </ul>

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($portfolioItems as $item): ?>
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-<?= htmlspecialchars($item['category']) ?>">
            <div class="portfolio-content h-100">
              <img src="<?= $asset($item['image_path']) ?>" class="img-fluid" alt="<?= htmlspecialchars($item['title']) ?>">
              <div class="portfolio-info">
                <h4><?= htmlspecialchars($item['title']) ?></h4>
                <p><?= htmlspecialchars((string) $item['description']) ?></p>
                <a href="<?= $asset($item['image_path']) ?>" title="<?= htmlspecialchars($item['title']) ?>" data-gallery="portfolio-gallery-<?= htmlspecialchars($item['category']) ?>" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <?php if (!empty($item['details_url'])): ?>
                  <a href="<?= htmlspecialchars($item['details_url']) ?>" title="More details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>

</section>
