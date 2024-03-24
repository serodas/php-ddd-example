<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses;

use MyLibrary\Librarify\Courses\Domain\Course;
use MyLibrary\Librarify\Courses\Domain\CourseRepository;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CoursesModuleUnitTestCase extends UnitTestCase
{
    private CourseRepository|MockInterface|null $repository;

    protected function shouldSave(Course $course): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($course))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(CourseId $id, ?Course $course): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($course);
    }

    protected function repository(): CourseRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CourseRepository::class);
    }
}
