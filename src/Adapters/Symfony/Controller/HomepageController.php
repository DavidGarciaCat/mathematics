<?php

namespace App\Adapters\Symfony\Controller;

use App\Adapters\Symfony\DTO\Inbound\FormModel;
use App\Adapters\Symfony\Form\Builder\FormBuilder;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Message\MessageFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController
{
    /**
     * @Route(path="/", name="homepage", methods={"GET", "POST"})
     * @Template()
     *
     * @param Request     $request
     * @param FormBuilder $formBuilder
     *
     * @return array
     */
    public function homepageAction(Request $request, FormBuilder $formBuilder, MessageFactory $messageFactory, HttpMethodsClientInterface $httpMethodsClient): array
    {
        $model = new FormModel();
        $result = null;

        $form = $formBuilder->getForm($model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $request = $messageFactory->createRequest(
                'POST',
                $model->endpoint,
                ['Content-Type' => 'application/json'],
                json_encode(['number1' => $model->number1, 'number2' => $model->number2])
            );
            $response = $httpMethodsClient->sendRequest($request);
            $result = (string) $response->getBody();
        }

        return [
            'form'   => $form->createView(),
            'result' => !empty($result) ? $result : 'Here you will see the response from the API',
            'alert'  => preg_match('/error/', $result) ? 'danger' : 'success',
        ];
    }
}
