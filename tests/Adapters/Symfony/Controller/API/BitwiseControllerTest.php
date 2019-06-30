<?php

namespace App\Tests\Adapters\Symfony\Controller\API;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BitwiseControllerTest extends WebTestCase
{
    public function testApiBitwiseAnd()
    {
        $client = static::createClient();
        $client->request('POST', '/api/bitwise/and', [], [], [], '{"number1":3,"number2":2}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('result', $response);
        $this->assertEquals(2, $response['result']);
    }

    public function testInvalidApiBitwiseAnd()
    {
        $client = static::createClient();
        $client->request('POST', '/api/bitwise/and', [], [], [], '{"number1":3}');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('error', $response);
        $this->assertEquals('Number 2 is required', $response['error']);
    }

    public function testApiBitwiseOr()
    {
        $client = static::createClient();
        $client->request('POST', '/api/bitwise/or', [], [], [], '{"number1":3,"number2":2}');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('result', $response);
        $this->assertEquals(3, $response['result']);
    }

    public function testInvalidApiBitwiseOr()
    {
        $client = static::createClient();
        $client->request('POST', '/api/bitwise/and', [], [], [], '{"number2":2}');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());

        $responseJson = $client->getResponse()->getContent();
        $response = json_decode($responseJson, true);

        $this->assertArrayHasKey('error', $response);
        $this->assertEquals('Number 1 is required', $response['error']);;
    }
}
