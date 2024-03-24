<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Domain;

use MyLibrary\Librarify\Courses\Domain\CourseDuration;
use MyLibrary\Tests\Shared\Domain\IntegerMother;
use MyLibrary\Tests\Shared\Domain\RandomElementPicker;

final class CourseDurationMother
{
    public static function create(?string $value = null): CourseDuration
    {
        return new CourseDuration($value ?? self::random());
    }

    private static function random(): string
    {
        return sprintf(
            '%s %s',
            IntegerMother::lessThan(100),
            RandomElementPicker::from('months', 'years', 'days', 'hours', 'minutes', 'seconds')
        );
    }
}
