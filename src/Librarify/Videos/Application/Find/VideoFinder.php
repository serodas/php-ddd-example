<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Find;

use MyLibrary\Librarify\Videos\Domain\VideoFinder as DomainVideoFinder;
use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Librarify\Videos\Domain\VideoRepository;

final class VideoFinder
{
    private readonly DomainVideoFinder $finder;

    public function __construct(VideoRepository $repository)
    {
        $this->finder = new DomainVideoFinder($repository);
    }

    public function __invoke(VideoId $id)
    {
        return $this->finder->__invoke($id);
    }
}
