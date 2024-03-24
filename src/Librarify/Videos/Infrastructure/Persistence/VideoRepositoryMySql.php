<?php

declare(strict_types=1);

namespace MyLibrary\Librarify\Videos\Infrastructure\Persistence;

use MyLibrary\Librarify\Videos\Domain\Video;
use MyLibrary\Librarify\Videos\Domain\VideoId;
use MyLibrary\Librarify\Videos\Domain\VideoRepository;
use MyLibrary\Librarify\Videos\Domain\Videos;
use MyLibrary\Shared\Domain\Criteria\Criteria;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use MyLibrary\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class VideoRepositoryMySql extends DoctrineRepository implements VideoRepository
{
    private static array $criteriaToDoctrineFields = [
        'id'        => 'id',
        'type'      => 'type',
        'title'     => 'title',
        'url'       => 'url',
        'course_id' => 'courseId',
    ];

    public function save(Video $video): void
    {
        $this->persist($video);
    }

    public function search(VideoId $id): ?Video
    {
        return $this->repository(Video::class)->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Videos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $videos           = $this->repository(Video::class)->matching($doctrineCriteria)->toArray();

        return new Videos($videos);
    }
}
