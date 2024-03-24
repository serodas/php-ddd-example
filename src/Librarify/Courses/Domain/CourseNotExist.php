<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Courses\Domain;

use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Shared\Domain\DomainError;

final class CourseNotExist extends DomainError
{
    public function __construct(private readonly CourseId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'course_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The course <%s> does not exist', $this->id->value());
    }
}
