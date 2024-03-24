<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Domain;

use MyLibrary\Librarify\Courses\Application\Create\CreateCourseCommand;
use MyLibrary\Librarify\Courses\Domain\Course;
use MyLibrary\Librarify\Courses\Domain\CourseDuration;
use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;

final class CourseMother
{
    public static function create(
        ?CourseId $id = null,
        ?CourseName $name = null,
        ?CourseDuration $duration = null
    ): Course {
        return new Course(
            $id ?? CourseIdMother::create(),
            $name ?? CourseNameMother::create(),
            $duration ?? CourseDurationMother::create()
        );
    }

    public static function fromRequest(CreateCourseCommand $request): Course
    {
        return self::create(
            CourseIdMother::create($request->id()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
    }
}
