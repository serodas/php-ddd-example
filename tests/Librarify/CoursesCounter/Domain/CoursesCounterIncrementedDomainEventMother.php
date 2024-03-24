<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\CoursesCounter\Domain;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounter;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterId;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterTotal;

final class CoursesCounterIncrementedDomainEventMother
{
    public static function create(
        ?CoursesCounterId $id = null,
        ?CoursesCounterTotal $total = null
    ): CoursesCounterIncrementedDomainEvent {
        return new CoursesCounterIncrementedDomainEvent(
            $id?->value() ?? CoursesCounterIdMother::create()->value(),
            $total?->value() ?? CoursesCounterTotalMother::create()->value()
        );
    }

    public static function fromCounter(CoursesCounter $counter): CoursesCounterIncrementedDomainEvent
    {
        return self::create($counter->id(), $counter->total());
    }
}
