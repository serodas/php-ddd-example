<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Application\Create;

use MyLibrary\Librarify\Courses\Domain\Course;
use MyLibrary\Librarify\Courses\Domain\CourseDuration;
use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Librarify\Courses\Domain\CourseRepository;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{
    public function __construct(private readonly CourseRepository $repository, private readonly EventBus $bus)
    {
    }

    public function __invoke(CourseId $id, CourseName $name, CourseDuration $duration): void
    {
        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
