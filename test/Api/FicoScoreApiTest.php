<?php

namespace FicoscorePeruSandbox\Client;

use \FicoscorePeruSandbox\Client\Configuration;
use \FicoscorePeruSandbox\Client\Api\FicoScoreApi;
use \FicoscorePeruSandbox\Client\Model\DatosConsulta;

class FicoScoreApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $config = new \FicoscorePeruSandbox\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client();
        $this->apiInstance = new \FicoscorePeruSandbox\Client\Api\FicoScoreApi($client, $config);
    }

    public function testFicoScore()
    {
        $x_api_key = "your_api_key";
        $request = new \FicoscorePeruSandbox\Client\Model\DatosConsulta();

        $request->setNumeroDocumento('xxxxx');
        $request->setTipoDocumento('x');
        $request->setFolioConsultaOtorgante(null);

        try {
            $result = $this->apiInstance->ficoScore($x_api_key, $request);
            $this->assertNotNull($result);
        } catch (Exception $e) {
            echo 'Exception when calling FicoScoreApi->ficoScore: ', $e->getMessage(), PHP_EOL;
        }
    }
}
