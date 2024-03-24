<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\Courses\Application\Create;

use MyLibrary\Librarify\Courses\Application\Create\CourseCreator;
use MyLibrary\Librarify\Courses\Application\Create\CreateCourseCommandHandler;
use MyLibrary\Tests\Librarify\Courses\CoursesModuleUnitTestCase;
use MyLibrary\Tests\Librarify\Courses\Domain\CourseCreatedDomainEventMother;
use MyLibrary\Tests\Librarify\Courses\Domain\CourseMother;

final class CreateCourseCommandHandlerTest extends CoursesModuleUnitTestCase
{
    private CreateCourseCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateCourseCommandHandler(new CourseCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $command = CreateCourseCommandMother::create();

        $course      = CourseMother::fromRequest($command);
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
