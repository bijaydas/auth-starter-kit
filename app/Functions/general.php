<?php

declare(strict_types=1);

if (! function_exists('title')) {
    function title(?string $string = null): string
    {
        $appName = config('app.name');

        if ($string) {
            return $string.' | '.$appName;
        }

        return $appName;
    }
}
