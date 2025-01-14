<?php

declare(strict_types=1);

namespace TomasVotruba\Website\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symplify\PackageBuilder\Parameter\ParameterProvider;
use TomasVotruba\Blog\Templating\ResponseRenderer;
use TomasVotruba\Website\ValueObject\Option;
use TomasVotruba\Website\ValueObject\RouteName;

final class MissionController
{
    /**
     * @var mixed[]
     */
    private array $helpedCompanies = [];

    public function __construct(
        ParameterProvider $parameterProvider,
        private ResponseRenderer $responseRenderer
    ) {
        $this->helpedCompanies = $parameterProvider->provideArrayParameter(Option::HELPED_COMPANIES);
    }

    #[Route(path: 'mission', name: RouteName::MISSION)]
    public function __invoke(): Response
    {
        return $this->responseRenderer->render('mission.twig', [
            'helped_companies' => $this->helpedCompanies,
            'title' => 'The Mission',
        ]);
    }
}
