<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\CoursesCounter\Domain;

use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounter;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterId;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterTotal;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Tests\Librarify\Courses\Domain\CourseIdMother;
use MyLibrary\Tests\Shared\Domain\Repeater;

final class CoursesCounterMother
{
    public static function create(
        ?CoursesCounterId $id = null,
        ?CoursesCounterTotal $total = null,
        CourseId ...$existingCourses
    ): CoursesCounter {
        return new CoursesCounter(
            $id ?? CoursesCounterIdMother::create(),
            $total ?? CoursesCounterTotalMother::create(),
            ...count($existingCourses) ? $existingCourses : Repeater::random(fn () => CourseIdMother::create())
        );
    }

    public static function withOne(CourseId $courseId): CoursesCounter
    {
        return self::create(CoursesCounterIdMother::create(), CoursesCounterTotalMother::one(), $courseId);
    }

    public static function incrementing(CoursesCounter $existingCounter, CourseId $courseId): CoursesCounter
    {
        return self::create(
            $existingCounter->id(),
            CoursesCounterTotalMother::create($existingCounter->total()->value() + 1),
            ...array_merge($existingCounter->existingCourses(), [$courseId])
        );
    }
}
