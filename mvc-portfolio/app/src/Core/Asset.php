<?php

namespace App\Core;

class Asset
{
    private const PUBLIC_DIR = __DIR__ . '/../../public/';

    public static function url(?string $path): string
    {
        if ($path === null || $path === '') {
            return '';
        }

        $relative = ltrim($path, '/');
        $file = self::PUBLIC_DIR . $relative;

        if (!is_file($file)) {
            return $relative;
        }

        return $relative . '?v=' . filemtime($file);
    }
}
