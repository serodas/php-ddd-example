<?php

declare(strict_types=1);

namespace MyLibrary\Tests\Librarify\CoursesCounter\Application\Find;

use MyLibrary\Librarify\CoursesCounter\Application\Find\CoursesCounterFinder;
use MyLibrary\Librarify\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use MyLibrary\Librarify\CoursesCounter\Application\Find\FindCoursesCounterQueryHandler;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterNotExist;
use MyLibrary\Tests\Librarify\CoursesCounter\CoursesCounterModuleUnitTestCase;
use MyLibrary\Tests\Librarify\CoursesCounter\Domain\CoursesCounterMother;

final class FindCoursesCounterQueryHandlerTest extends CoursesCounterModuleUnitTestCase
{
    private FindCoursesCounterQueryHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindCoursesCounterQueryHandler(new CoursesCounterFinder($this->repository()));
    }

    /** @test */
    public function it_should_find_an_existing_courses_counter(): void
    {
        $counter  = CoursesCounterMother::create();
        $query    = new FindCoursesCounterQuery();
        $response = CoursesCounterResponseMother::create($counter->total());

        $this->shouldSearch($counter);

        $this->assertAskResponse($response, $query, $this->handler);
    }

    /** @test */
    public function it_should_throw_an_exception_when_courses_counter_does_not_exists(): void
    {
        $query = new FindCoursesCounterQuery();

        $this->shouldSearch(null);

        $this->assertAskThrowsException(CoursesCounterNotExist::class, $query, $this->handler);
    }
}
