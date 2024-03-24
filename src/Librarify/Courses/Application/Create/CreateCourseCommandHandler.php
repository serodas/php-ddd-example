<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Application\Create;

use MyLibrary\Librarify\Courses\Domain\CourseDuration;
use MyLibrary\Librarify\Courses\Domain\CourseName;
use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCourseCommandHandler implements CommandHandler
{
    public function __construct(private readonly CourseCreator $creator)
    {
    }

    public function __invoke(CreateCourseCommand $command): void
    {
        $id       = new CourseId($command->id());
        $name     = new CourseName($command->name());
        $duration = new CourseDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}
