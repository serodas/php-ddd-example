<?php

declare(strict_types=1);

namespace MyLibrary\Apps\Librarify\Backend\Controller\CoursesCounter;

use MyLibrary\Librarify\CoursesCounter\Application\Find\CoursesCounterResponse;
use MyLibrary\Librarify\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use MyLibrary\Librarify\CoursesCounter\Domain\CoursesCounterNotExist;
use MyLibrary\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CoursesCounterGetController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        /** @var CoursesCounterResponse $response */
        $response = $this->ask(new FindCoursesCounterQuery());

        return new JsonResponse(
            [
                'total' => $response->total(),
            ]
        );
    }

    protected function exceptions(): array
    {
        return [
            CoursesCounterNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }
}
