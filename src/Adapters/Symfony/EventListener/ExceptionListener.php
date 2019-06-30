<?php

namespace App\Adapters\Symfony\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof BadRequestHttpException) {
            $event->setResponse(
                new JsonResponse(
                    ['error' => $exception->getMessage()],
                    JsonResponse::HTTP_BAD_REQUEST
                )
            );
        }
    }
}