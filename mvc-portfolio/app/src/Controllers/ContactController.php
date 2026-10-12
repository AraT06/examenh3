<?php

namespace App\Controllers;

use App\Models\ContactMessageModel;

class ContactController
{
    public function store(): void
    {
        header('Content-Type: text/plain; charset=utf-8');

        $name = trim((string) ($_POST['name'] ?? ''));
        $email = trim((string) ($_POST['email'] ?? ''));
        $subject = trim((string) ($_POST['subject'] ?? ''));
        $message = trim((string) ($_POST['message'] ?? ''));

        if ($name === '' || $subject === '' || $message === '') {
            http_response_code(422);
            echo 'Missing required fields.';
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422);
            echo 'The email address is not valid.';
            return;
        }

        (new ContactMessageModel())->create($name, $email, $subject, $message);

        echo 'OK';
    }
}
