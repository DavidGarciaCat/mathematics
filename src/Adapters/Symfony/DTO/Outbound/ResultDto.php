<?php


namespace App\Adapters\Symfony\DTO\Outbound;


class ResultDto implements \JsonSerializable
{
    /**
     * @var int
     */
    private $result;

    /**
     * ResultDto constructor.
     *
     * @param int $result
     */
    private function __construct(int $result)
    {
        $this->result = $result;
    }

    /**
     * Named constructor from the Result.
     *
     * @param int $result
     *
     * @return ResultDto
     */
    public static function createFromResult(int $result): self
    {
        return new self($result);
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        return ['result' => $this->result];
    }
}
