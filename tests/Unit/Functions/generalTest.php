<?php

declare(strict_types=1);

describe('title', function () {
    $appName = 'Auth Template';
    it('valid title', function () use ($appName) {
        expect(title('foo'))->toBe('foo | '.$appName);
    });

    it('default app name', function () use ($appName) {
        expect(title())->toBe($appName);
    });
});
