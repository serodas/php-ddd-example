<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Find;

use MyLibrary\Shared\Domain\Bus\Query\Query;

final class FindVideoQuery implements Query
{
    public function __construct(private readonly string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}
