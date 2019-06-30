<?php

namespace App\Adapters\Symfony\Controller\API;

use App\Adapters\Symfony\DTO\Inbound\TwoIntegersDto;
use App\Adapters\Symfony\DTO\Outbound\ResultDto;
use App\Application\Mathematics\Arithmetical;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArithmeticalController extends AbstractController
{
    private $arithmetical;

    public function __construct(Arithmetical $arithmetical)
    {
        $this->arithmetical = $arithmetical;
    }

    /**
     * @Route(path="/api/arithmetical/add", name="api_arithmetical_add", methods={"POST"})
     * @ParamConverter("twoIntegersDto", converter="two_integers")
     *
     * @param TwoIntegersDto $twoIntegersDto
     *
     * @return JsonResponse
     */
    public function addAction(TwoIntegersDto $twoIntegersDto): JsonResponse
    {
        return new JsonResponse(
            ResultDto::createFromResult(
                $this->arithmetical->add($twoIntegersDto->number1, $twoIntegersDto->number2)
            )
        );
    }

    /**
     * @Route(path="/api/arithmetical/sub", name="api_arithmetical_sub", methods={"POST"})
     * @ParamConverter("twoIntegersDto", converter="two_integers")
     *
     * @param TwoIntegersDto $twoIntegersDto
     *
     * @return JsonResponse
     */
    public function subAction(TwoIntegersDto $twoIntegersDto): JsonResponse
    {
        return new JsonResponse(
            ResultDto::createFromResult(
                $this->arithmetical->subtract($twoIntegersDto->number1, $twoIntegersDto->number2)
            )
        );
    }

    /**
     * @Route(path="/api/arithmetical/mul", name="api_arithmetical_mul", methods={"POST"})
     * @ParamConverter("twoIntegersDto", converter="two_integers")
     *
     * @param TwoIntegersDto $twoIntegersDto
     *
     * @return JsonResponse
     */
    public function mulAction(TwoIntegersDto $twoIntegersDto): JsonResponse
    {
        return new JsonResponse(
            ResultDto::createFromResult(
                $this->arithmetical->multiply($twoIntegersDto->number1, $twoIntegersDto->number2)
            )
        );
    }

    /**
     * @Route(path="/api/arithmetical/div", name="api_arithmetical_div", methods={"POST"})
     * @ParamConverter("twoIntegersDto", converter="two_integers")
     *
     * @param TwoIntegersDto $twoIntegersDto
     *
     * @return JsonResponse
     */
    public function divAction(TwoIntegersDto $twoIntegersDto): JsonResponse
    {
        return new JsonResponse(
            ResultDto::createFromResult(
                $this->arithmetical->divide($twoIntegersDto->number1, $twoIntegersDto->number2)
            )
        );
    }
}
