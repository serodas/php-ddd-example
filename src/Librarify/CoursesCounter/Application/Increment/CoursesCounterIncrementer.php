<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\CoursesCounter\Application\Increment;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounter;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterId;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterRepository;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Domain\Bus\Event\EventBus;
use MyLibrary\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    public function __construct(
        private readonly CoursesCounterRepository $repository,
        private readonly UuidGenerator $uuidGenerator,
        private readonly EventBus $bus
    ) {
    }

    public function __invoke(CourseId $courseId): void
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($courseId)) {
            $counter->increment($courseId);

            $this->repository->save($counter);
            $this->bus->publish(...$counter->pullDomainEvents());
        }
    }

    private function initializeCounter(): CoursesCounter
    {
        return CoursesCounter::initialize(new CoursesCounterId($this->uuidGenerator->generate()));
    }
}
