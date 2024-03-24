<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Trim;

use MyLibrary\Shared\Domain\Bus\Command\Command;

final class TrimVideoCommand implements Command
{
    public function __construct(private readonly string $videoId, private readonly int $keepFromSecond, private readonly int $keepToSecond)
    {
    }

    public function videoId(): string
    {
        return $this->videoId;
    }

    public function keepFromSecond(): int
    {
        return $this->keepFromSecond;
    }

    public function keepToSecond(): int
    {
        return $this->keepToSecond;
    }
}
