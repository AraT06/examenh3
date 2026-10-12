<?php
$half = (int) ceil(count($skills) / 2);
$skillColumns = array_chunk($skills, max($half, 1));
?>
<section id="skills" class="skills section light-background">

  <div class="container section-title" data-aos="fade-up">
    <h2>Skills</h2>
    <p>Technologies I work with day to day, in coursework and in my own projects.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row skills-content skills-animation">
      <?php foreach ($skillColumns as $column): ?>
        <div class="col-lg-6">
          <?php foreach ($column as $skill): ?>
            <div class="progress">
              <span class="skill"><span><?= htmlspecialchars($skill['name']) ?></span> <i class="val"><?= (int) $skill['percent'] ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= (int) $skill['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>

</section>
