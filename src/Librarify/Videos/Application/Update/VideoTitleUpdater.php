<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Update;

use MyLibrary\Librarify\Videos\Domain\VideoFinder;
use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Librarify\Videos\Domain\VideoRepository;
use MyLibrary\Librarify\Videos\Domain\VideoTitle;

final class VideoTitleUpdater
{
    private readonly VideoFinder $finder;

    public function __construct(private readonly VideoRepository $repository)
    {
        $this->finder = new VideoFinder($repository);
    }

    public function __invoke(VideoId $id, VideoTitle $newTitle): void
    {
        $video = $this->finder->__invoke($id);

        $video->updateTitle($newTitle);

        $this->repository->save($video);
    }
}
