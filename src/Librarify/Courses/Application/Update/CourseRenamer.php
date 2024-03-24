<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Application\Update;

use MyLibrary\Librarify\Courses\Application\Find\CourseFinder;
use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Librarify\Courses\Domain\CourseRepository;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Domain\Bus\Event\EventBus;

final class CourseRenamer
{
    private readonly CourseFinder     $finder;

    public function __construct(private readonly CourseRepository $repository, private readonly EventBus $bus)
    {
        $this->finder = new CourseFinder($repository);
    }

    public function __invoke(CourseId $id, CourseName $newName): void
    {
        $course = $this->finder->__invoke($id);

        $course->rename($newName);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
