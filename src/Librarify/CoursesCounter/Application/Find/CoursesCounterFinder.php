<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\CoursesCounter\Application\Find;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterNotExist;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterRepository;

final class CoursesCounterFinder
{
    public function __construct(private readonly CoursesCounterRepository $repository)
    {
    }

    public function __invoke(): CoursesCounterResponse
    {
        $counter = $this->repository->search();

        if (null === $counter) {
            throw new CoursesCounterNotExist();
        }

        return new CoursesCounterResponse($counter->total()->value());
    }
}
