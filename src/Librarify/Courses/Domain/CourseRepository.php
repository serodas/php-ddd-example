<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Domain;

use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}
