<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    /**
     * Display the image.
     *
     * @param string|null $image
     * @return string
     */
    public static function display($image)
    {
        if (!$image) {
            return 'https://placehold.co/600x400?text=No+Image';
        }

        if (Str::startsWith($image, ['http://', 'https://'])) {
            return $image;
        }

        return Storage::url($image);
    }
}
