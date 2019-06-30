<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelInterface;

class FeatureContext implements Context
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Response|null
     */
    private $response;

    /**
     * FeatureContext constructor.
     *
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When I send a :method request to :resource with the following body
     *
     * @param string       $method
     * @param string       $resource
     * @param PyStringNode $string
     *
     * @throws Exception
     */
    public function iSendARequestToWithTheFollowingBody(string $method, string $resource, PyStringNode $string)
    {
        $this->response = $this->kernel->handle(Request::create($resource, $method, [], [], [] ,[], $string->getRaw()));
    }

    /**
     * @When I send a :method request to :resource with an empty body
     *
     * @param string $method
     * @param string $resource
     *
     * @throws Exception
     */
    public function iSendARequestToWithAnEmptyBody(string $method, string $resource)
    {
        $this->response = $this->kernel->handle(Request::create($resource, $method));
    }

    /**
     * @Then the response should be like
     *
     * @param PyStringNode $string
     */
    public function theResponseShouldBeLike(PyStringNode $string)
    {
        $expected = json_decode($string->getRaw());
        $provided = json_decode($this->response->getContent());

        if ($expected->result != $provided->result) {
            throw new \RuntimeException('The provided response does not match with the expected response');
        }
    }

    /**
     * @Then the response should report a Bad Request error
     */
    public function theResponseShouldReportABadRequestError()
    {
        if (400 !== $this->response->getStatusCode()) {
            throw new \RuntimeException('400 Bad Request expected but not returned');
        }
    }
}
