<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Shared\Infrastructure\Bus\Event\RabbitMq;

use MyLibrary\Librarify\Courses\Domain\CourseCreatedDomainEvent;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use MyLibrary\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class TestAllWorksOnRabbitMqEventsPublished implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [
            CourseCreatedDomainEvent::class,
            CoursesCounterIncrementedDomainEvent::class,
        ];
    }

    public function __invoke(CourseCreatedDomainEvent|CoursesCounterIncrementedDomainEvent $event): void
    {
    }
}
