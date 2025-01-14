<?php

declare(strict_types=1);

namespace TomasVotruba\Website\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TomasVotruba\Blog\Templating\ResponseRenderer;
use TomasVotruba\Website\ValueObject\RouteName;

final class ContactController
{
    public function __construct(
        private ResponseRenderer $responseRenderer
    ) {
    }

    #[Route(path: 'contact', name: RouteName::CONTACT)]
    public function __invoke(): Response
    {
        return $this->responseRenderer->render('contact.twig', [
            'title' => 'Get in Touch',
        ]);
    }
}
