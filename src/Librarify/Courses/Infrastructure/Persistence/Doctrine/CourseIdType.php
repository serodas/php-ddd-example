<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Infrastructure\Persistence\Doctrine;

use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CourseId::class;
    }
}
