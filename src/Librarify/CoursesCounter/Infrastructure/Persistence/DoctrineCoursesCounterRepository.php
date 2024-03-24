<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\CoursesCounter\Infrastructure\Persistence;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounter;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterRepository;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCoursesCounterRepository extends DoctrineRepository implements CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CoursesCounter
    {
        return $this->repository(CoursesCounter::class)->findOneBy([]);
    }
}
