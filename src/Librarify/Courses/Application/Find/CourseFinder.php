<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Application\Find;

use MyLibrary\Librarify\Courses\Domain\Course;
use MyLibrary\Librarify\Courses\Domain\CourseNotExist;
use MyLibrary\Librarify\Courses\Domain\CourseRepository;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;

final class CourseFinder
{
    public function __construct(private readonly CourseRepository $repository)
    {
    }

    public function __invoke(CourseId $id): Course
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new CourseNotExist($id);
        }

        return $course;
    }
}
