<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Create;

use MyLibrary\Librarify\Shared\Domain\Courses\CourseId;
use MyLibrary\Librarify\Shared\Domain\Videos\VideoUrl;
use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Librarify\Videos\Domain\VideoTitle;
use MyLibrary\Librarify\Videos\Domain\VideoType;
use MyLibrary\Shared\Domain\Bus\Command\CommandHandler;

final class CreateVideoCommandHandler implements CommandHandler
{
    public function __construct(private readonly VideoCreator $creator)
    {
    }

    public function __invoke(CreateVideoCommand $command): void
    {
        $id       = new VideoId($command->id());
        $type     = new VideoType($command->type());
        $title    = new VideoTitle($command->title());
        $url      = new VideoUrl($command->url());
        $courseId = new CourseId($command->courseId());

        $this->creator->create($id, $type, $title, $url, $courseId);
    }
}
