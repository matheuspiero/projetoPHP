<?php

namespace Alura\Mvc\Controller;


use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeleteVideoController implements RequestHandlerInterface
{
    

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {            
            return new Response(302, [
                'Location' =>'/'
            ]);
        }

        $success = $this->videoRepository->remove($id);
        if ($success === false) {
            return new Response(302, [
                'Location' =>'/'
            ]);
        } else {
            return new Response(302, [
                'Location' =>'/'
            ]);
        }

    }
}
