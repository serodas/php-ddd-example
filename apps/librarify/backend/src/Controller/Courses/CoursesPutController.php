<?php

declare(strict_types=1);

namespace MyLibrary\Apps\Librarify\Backend\Controller\Courses;

use MyLibrary\Librarify\Courses\Application\Create\CreateCourseCommand;
use MyLibrary\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesPutController extends ApiController
{
    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new CreateCourseCommand(
                $id,
                (string) $request->request->get('name'),
                (string) $request->request->get('duration')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}