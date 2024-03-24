<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\CoursesCounter\Domain;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterId;
use MyLibrary\Tests\Shared\Domain\UuidMother;

final class CoursesCounterIdMother
{
    public static function create(?string $value = null): CoursesCounterId
    {
        return new CoursesCounterId($value ?? UuidMother::create());
    }
}
