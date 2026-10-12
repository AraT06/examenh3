<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class PortfolioController
{
    public function index(): void
    {
        $model = new ProfileModel();

        $profile = $model->getProfile();
        if ($profile === null) {
            http_response_code(503);
            echo 'No profile data yet. Run php bin/migrate.php and php bin/seed.php.';
            return;
        }

        $socials = $model->getSocialLinks();
        $stats = $model->getStats();
        $skills = $model->getSkills();
        $education = $model->getResumeItems('education');
        $experience = $model->getResumeItems('experience');
        $portfolioItems = $model->getPortfolioItems();
        $portfolioCategories = $model->getPortfolioCategories();
        $services = $model->getServices();

        $navLinks = array_values(array_filter([
            ['href' => '#hero', 'icon' => 'bi bi-house', 'label' => 'Home'],
            ['href' => '#about', 'icon' => 'bi bi-person', 'label' => 'About'],
            ['href' => '#skills', 'icon' => 'bi bi-bar-chart', 'label' => 'Skills'],
            ['href' => '#resume', 'icon' => 'bi bi-file-earmark-text', 'label' => 'Resume'],
            $portfolioItems ? ['href' => '#portfolio', 'icon' => 'bi bi-images', 'label' => 'Portfolio'] : null,
            ['href' => '#services', 'icon' => 'bi bi-hdd-stack', 'label' => 'Services'],
            ['href' => '#contact', 'icon' => 'bi bi-envelope', 'label' => 'Contact'],
        ]));

        require __DIR__ . '/../Views/portfolio/index.php';
    }
}
