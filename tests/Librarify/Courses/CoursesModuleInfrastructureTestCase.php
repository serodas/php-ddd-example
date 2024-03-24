<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses;

use MyLibrary\Librarify\Courses\Domain\CourseRepository;
use MyLibrary\Tests\Librarify\Shared\Infrastructure\PhpUnit\LibrarifyContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends LibrarifyContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}
