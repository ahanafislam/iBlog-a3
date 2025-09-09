<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class StringHelper {
    public static function postPreview($text, $words = 20) {
        return Str::words($text, $words, '...');
    }
}
