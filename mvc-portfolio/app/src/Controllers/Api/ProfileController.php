<?php

namespace App\Controllers\Api;

use App\Models\ProfileModel;

class ProfileController
{
    public function index(): void
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Content-Type: application/json');

        $model = new ProfileModel();
        $profile = $model->getProfile();

        if ($profile === null) {
            http_response_code(404);
            echo json_encode(['error' => 'profile not seeded']);
            return;
        }

        echo json_encode([
            'profile' => $profile,
            'socials' => $model->getSocialLinks(),
            'stats' => $model->getStats(),
            'skills' => $model->getSkills(),
            'education' => $model->getResumeItems('education'),
            'experience' => $model->getResumeItems('experience'),
            'portfolio' => $model->getPortfolioItems(),
            'services' => $model->getServices(),
        ], JSON_UNESCAPED_UNICODE);
    }
}
