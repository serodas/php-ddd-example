<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\CoursesCounter\Infrastructure\Persistence\Doctrine;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterId;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CoursesCounterId::class;
    }
}
