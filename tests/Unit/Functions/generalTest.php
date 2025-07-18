<?php

declare(strict_types=1);

describe('title', function () {
    it('valid title', function () {
        expect(title('foo'))->toBe('foo | Auth');
    });

    it('default app name', function () {
        expect(title())->toBe('Auth');
    });
});
