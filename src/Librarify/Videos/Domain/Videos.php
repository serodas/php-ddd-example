<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Domain;

use MyLibrary\Shared\Domain\Collection;

final class Videos extends Collection
{
    protected function type(): string
    {
        return Video::class;
    }
}
