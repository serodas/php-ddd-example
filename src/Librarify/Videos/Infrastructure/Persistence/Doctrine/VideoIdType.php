<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Infrastructure\Persistence\Doctrine;

use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class VideoIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return VideoId::class;
    }
}
