<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Domain;

use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Tests\Shared\Domain\UuidMother;

final class CourseIdMother
{
    public static function create(?string $value = null): CourseId
    {
        return new CourseId($value ?? UuidMother::create());
    }
}
