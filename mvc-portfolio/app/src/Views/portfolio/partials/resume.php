<section id="resume" class="resume section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Resume</h2>
    <p>Education and hands on experience, read straight from the database.</p>
  </div>

  <div class="container">

    <div class="row">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <h3 class="resume-title">Summary</h3>

        <div class="resume-item pb-0">
          <h4><?= htmlspecialchars($profile['full_name']) ?></h4>
          <p><em><?= htmlspecialchars($profile['about_intro']) ?></em></p>
          <ul>
            <li><?= htmlspecialchars((string) $profile['address']) ?></li>
            <li><?= htmlspecialchars((string) $profile['phone']) ?></li>
            <li><?= htmlspecialchars((string) $profile['email']) ?></li>
          </ul>
        </div>

        <h3 class="resume-title">Education</h3>
        <?php foreach ($education as $item): ?>
          <div class="resume-item">
            <h4><?= htmlspecialchars($item['title']) ?></h4>
            <h5><?= htmlspecialchars((string) $item['period']) ?></h5>
            <p><em><?= htmlspecialchars((string) $item['place']) ?></em></p>
            <?php if (!empty($item['body'])): ?>
              <p><?= nl2br(htmlspecialchars($item['body'])) ?></p>
            <?php endif; ?>
            <?php if ($item['bullets_list']): ?>
              <ul>
                <?php foreach ($item['bullets_list'] as $bullet): ?>
                  <li><?= htmlspecialchars($bullet) ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>

      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <h3 class="resume-title">Experience</h3>
        <?php foreach ($experience as $item): ?>
          <div class="resume-item">
            <h4><?= htmlspecialchars($item['title']) ?></h4>
            <h5><?= htmlspecialchars((string) $item['period']) ?></h5>
            <p><em><?= htmlspecialchars((string) $item['place']) ?></em></p>
            <?php if (!empty($item['body'])): ?>
              <p><?= nl2br(htmlspecialchars($item['body'])) ?></p>
            <?php endif; ?>
            <?php if ($item['bullets_list']): ?>
              <ul>
                <?php foreach ($item['bullets_list'] as $bullet): ?>
                  <li><?= htmlspecialchars($bullet) ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>

</section>
