<?php

namespace App\Tests\Adapters\Symfony\Controller\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArithmeticalControllerTest extends WebTestCase
{
    public function testApiArithmeticalAdd()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/add', [], [], [], '{"number1":3,"number2":2}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('result', $response);
        $this->assertEquals(5, $response['result']);
    }

    public function testInvalidApiArithmeticalAdd()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/add', [], [], [], '{"number1":3}');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('error', $response);
        $this->assertEquals('Number 2 is required', $response['error']);
    }

    public function testApiArithmeticalSubtract()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/sub', [], [], [], '{"number1":3,"number2":2}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('result', $response);
        $this->assertEquals(1, $response['result']);
    }

    public function testInvalidApiArithmeticalSubtract()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/sub', [], [], [], '{"number2":2}');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('error', $response);
        $this->assertEquals('Number 1 is required', $response['error']);
    }

    public function testApiArithmeticalMultiply()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/mul', [], [], [], '{"number1":3,"number2":2}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('result', $response);
        $this->assertEquals(6, $response['result']);
    }

    public function testInvalidApiArithmeticalMultiply()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/mul', [], [], [], '{}');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('error', $response);
        $this->assertEquals('Number 1 is required', $response['error']);
    }

    public function testApiArithmeticalDivide()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/div', [], [], [], '{"number1":3,"number2":2}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('result', $response);
        $this->assertEquals(1, $response['result']);
    }

    public function testInvalidApiArithmeticalDivide()
    {
        $client = static::createClient();
        $client->request('POST', '/api/arithmetical/div');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('error', $response);
        $this->assertEquals('Syntax error', $response['error']);
    }
}
