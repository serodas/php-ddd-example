<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Shared\Domain\Videos;

use MyLibrary\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class VideoUrl extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValidUrl($value);

        parent::__construct($value);
    }

    private function ensureIsValidUrl(string $url): void
    {
        if (false === filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(sprintf('The url <%s> is not well formatted', $url));
        }
    }
}