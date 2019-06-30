<?php

namespace App\Adapters\Symfony\Controller\API;

use App\Adapters\Symfony\DTO\Inbound\TwoIntegersDto;
use App\Adapters\Symfony\DTO\Outbound\ResultDto;
use App\Application\Mathematics\Bitwise;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BitwiseController extends AbstractController
{
    /**
     * @var Bitwise
     */
    private $bitwise;

    /**
     * BitwiseController constructor.
     *
     * @param Bitwise $bitwise
     */
    public function __construct(Bitwise $bitwise)
    {
        $this->bitwise = $bitwise;
    }

    /**
     * @Route(path="/api/bitwise/and", name="api_bitwise_and", methods={"POST"})
     * @ParamConverter("twoIntegersDto", converter="two_integers")
     *
     * @param TwoIntegersDto $twoIntegersDto
     *
     * @return JsonResponse
     */
    public function andAction(TwoIntegersDto $twoIntegersDto): JsonResponse
    {
        return new JsonResponse(
            ResultDto::createFromResult(
                $this->bitwise->and($twoIntegersDto->number1, $twoIntegersDto->number2)
            )
        );
    }

    /**
     * @Route(path="/api/bitwise/or", name="api_bitwise_or", methods={"POST"})
     * @ParamConverter("twoIntegersDto", converter="two_integers")
     *
     * @param TwoIntegersDto $twoIntegersDto
     *
     * @return JsonResponse
     */
    public function orAction(TwoIntegersDto $twoIntegersDto): JsonResponse
    {
        return new JsonResponse(
            ResultDto::createFromResult(
                $this->bitwise->or($twoIntegersDto->number1, $twoIntegersDto->number2)
            )
        );
    }
}
