<section id="hero" class="hero section dark-background">

  <img src="<?= $asset($profile['hero_path']) ?>" alt="" data-aos="fade-in">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <h2><?= htmlspecialchars($profile['full_name']) ?></h2>
    <p>I'm a
      <span class="typed" data-typed-items="<?= htmlspecialchars($profile['typed_roles']) ?>"></span>
      <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
    </p>
  </div>

</section>
