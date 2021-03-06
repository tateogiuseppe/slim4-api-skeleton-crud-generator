<?php

declare(strict_types=1);

namespace App\Controller\Objectbase;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetOne extends Base
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $objectbase = $this->getObjectbaseService()->getOne((int) $args['id']);

        $payload = json_encode($objectbase);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
