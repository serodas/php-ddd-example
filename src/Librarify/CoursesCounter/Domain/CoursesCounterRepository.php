<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\CoursesCounter\Domain;

interface CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void;

    public function search(): ?CoursesCounter;
}
