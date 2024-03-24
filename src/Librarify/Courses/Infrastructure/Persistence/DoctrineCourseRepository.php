<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Infrastructure\Persistence;

use MyLibrary\Librarify\Courses\Domain\Course;
use MyLibrary\Librarify\Courses\Domain\CourseRepository;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
