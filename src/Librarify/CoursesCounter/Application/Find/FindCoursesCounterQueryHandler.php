<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\CoursesCounter\Application\Find;

use MyLibrary\Shared\Domain\Bus\Query\QueryHandler;

final class FindCoursesCounterQueryHandler implements QueryHandler
{
    public function __construct(private readonly CoursesCounterFinder $finder)
    {
    }

    public function __invoke(FindCoursesCounterQuery $query): CoursesCounterResponse
    {
        return $this->finder->__invoke();
    }
}
