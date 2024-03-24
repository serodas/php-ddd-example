<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Create;

use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Librarify\Shared\Domain\Videos\VideoUrl;
use MyLibrary\Librarify\Videos\Domain\Video;
use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Librarify\Videos\Domain\VideoRepository;
use MyLibrary\Librarify\Videos\Domain\VideoTitle;
use MyLibrary\Librarify\Videos\Domain\VideoType;
use MyLibrary\Shared\Domain\Bus\Event\EventBus;

final class VideoCreator
{
    public function __construct(private readonly VideoRepository $repository, private readonly EventBus $bus)
    {
    }

    public function create(VideoId $id, VideoType $type, VideoTitle $title, VideoUrl $url, CourseId $courseId): void
    {
        $video = Video::create($id, $type, $title, $url, $courseId);

        $this->repository->save($video);

        $this->bus->publish(...$video->pullDomainEvents());
    }
}
