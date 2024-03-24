<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Application\Create;

use MyLibrary\Librarify\Courses\Application\Create\CreateCourseCommand;
use MyLibrary\Librarify\Courses\Domain\CourseDuration;
use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Tests\Librarify\Courses\Domain\CourseDurationMother;
use MyLibrary\Tests\Librarify\Courses\Domain\CourseIdMother;
use MyLibrary\Tests\Librarify\Courses\Domain\CourseNameMother;

final class CreateCourseCommandMother
{
    public static function create(
        ?CourseId $id = null,
        ?CourseName $name = null,
        ?CourseDuration $duration = null
    ): CreateCourseCommand {
        return new CreateCourseCommand(
            $id?->value() ?? CourseIdMother::create()->value(),
            $name?->value() ?? CourseNameMother::create()->value(),
            $duration?->value() ?? CourseDurationMother::create()->value()
        );
    }
}
