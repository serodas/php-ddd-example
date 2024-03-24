<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\CoursesCounter\Application\Find;

use MyLibrary\Librarify\CoursesCounter\Application\Find\CoursesCounterResponse;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterTotal;
use MyLibrary\Tests\Librarify\CoursesCounter\Domain\CoursesCounterTotalMother;

final class CoursesCounterResponseMother
{
    public static function create(?CoursesCounterTotal $total = null): CoursesCounterResponse
    {
        return new CoursesCounterResponse($total?->value() ?? CoursesCounterTotalMother::create()->value());
    }
}
