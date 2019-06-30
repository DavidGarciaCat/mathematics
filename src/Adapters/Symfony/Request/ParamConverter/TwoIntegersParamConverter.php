<?php

namespace App\Adapters\Symfony\Request\ParamConverter;

use App\Adapters\Symfony\DTO\Inbound\TwoIntegersDto;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TwoIntegersParamConverter implements ParamConverterInterface
{
    const NAME = 'two_integers';

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * TwoIntegersParamConverter constructor.
     *
     * @param SerializerInterface $serializer
     * @param ValidatorInterface  $validator
     */
    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /** {@inheritDoc} */
    public function apply(Request $request, ParamConverter $configuration)
    {
        try {
            /** @var TwoIntegersDto $twoIntegers */
            $twoIntegers = $this
                ->serializer
                ->deserialize($request->getContent(), TwoIntegersDto::class, 'json');

            $errors = $this->validator->validate($twoIntegers);

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    throw new \InvalidArgumentException($error->getMessage());
                }
            }

            $request->attributes->set('twoIntegersDto', $twoIntegers);
        } catch (\Throwable $throwable) {
            throw new BadRequestHttpException($throwable->getMessage());
        }
    }

    /** {@inheritDoc} */
    public function supports(ParamConverter $configuration)
    {
        return $configuration->getConverter() === self::NAME;
    }
}
