<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Domain;

use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Tests\Shared\Domain\WordMother;

final class CourseNameMother
{
    public static function create(?string $value = null): CourseName
    {
        return new CourseName($value ?? WordMother::create());
    }
}
