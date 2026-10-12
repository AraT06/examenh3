<header id="header" class="header dark-background d-flex flex-column">
  <i class="header-toggle d-xl-none bi bi-list"></i>

  <div class="profile-img">
    <img src="<?= $asset($profile['avatar_path']) ?>" alt="<?= htmlspecialchars($profile['full_name']) ?>" class="img-fluid rounded-circle">
  </div>

  <a href="/" class="logo d-flex align-items-center justify-content-center">
    <h1 class="sitename"><?= htmlspecialchars($profile['full_name']) ?></h1>
  </a>

  <div class="social-links text-center">
    <?php foreach ($socials as $social): ?>
      <a href="<?= htmlspecialchars($social['url']) ?>" class="<?= htmlspecialchars($social['css_class']) ?>" target="_blank" rel="noopener">
        <i class="<?= htmlspecialchars($social['icon']) ?>"></i>
      </a>
    <?php endforeach; ?>
  </div>

  <nav id="navmenu" class="navmenu">
    <ul>
      <?php foreach ($navLinks as $i => $link): ?>
        <li>
          <a href="<?= htmlspecialchars($link['href']) ?>"<?= $i === 0 ? ' class="active"' : '' ?>>
            <i class="<?= htmlspecialchars($link['icon']) ?> navicon"></i> <?= htmlspecialchars($link['label']) ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

</header>
