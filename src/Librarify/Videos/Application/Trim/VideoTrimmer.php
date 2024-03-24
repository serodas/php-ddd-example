<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Trim;

use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Shared\Domain\SecondsInterval;

final class VideoTrimmer
{
    public function trim(VideoId $id, SecondsInterval $interval): void
    {
    }
}
