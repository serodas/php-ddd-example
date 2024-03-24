<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Application\Find;

use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\pipe;

final class FindVideoQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(VideoFinder $finder)
    {
        $this->finder = pipe($finder, new VideoResponseConverter());
    }

    public function __invoke(FindVideoQuery $query): VideoResponse
    {
        $id = new VideoId($query->id());

        return apply($this->finder, [$id]);
    }
}
