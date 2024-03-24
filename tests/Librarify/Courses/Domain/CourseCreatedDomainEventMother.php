<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Domain;

use MyLibrary\Librarify\Courses\Domain\Course;
use MyLibrary\Librarify\Courses\Domain\CourseCreatedDomainEvent;
use MyLibrary\Librarify\Courses\Domain\CourseDuration;
use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;

final class CourseCreatedDomainEventMother
{
    public static function create(
        ?CourseId $id = null,
        ?CourseName $name = null,
        ?CourseDuration $duration = null
    ): CourseCreatedDomainEvent {
        return new CourseCreatedDomainEvent(
            $id?->value() ?? CourseIdMother::create()->value(),
            $name?->value() ?? CourseNameMother::create()->value(),
            $duration?->value() ?? CourseDurationMother::create()->value()
        );
    }

    public static function fromCourse(Course $course): CourseCreatedDomainEvent
    {
        return self::create($course->id(), $course->name(), $course->duration());
    }
}
