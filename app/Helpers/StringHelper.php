<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    public static function postPreview($text, $limit = 100, $suffix = '...')
    {
        return Str::limit($text, $limit, $suffix);
    }
}
