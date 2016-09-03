<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;


/**
 * Created by PhpStorm.
 * User: zoy
 * Date: 30/03/16
 * Time: 23:59
 */
class RotasTest extends TestCase
{
    use WithoutMiddleware;


    function setUp()
    {
        parent::setUp();
    }


    /**
     *
     */
    public function testApplication()
    {
        //$this->assertEquals(200, 1);
        $this->visit('/');
        //$//this->visit('/');
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Url para teste do site
     *
     *
     * @return array
     */
    public function providerAllUrisWithResponseCode()
    {
        return [
            ['/', 200],
            ['/login', 200],
            ['/ajudas', 200],
            ['/busca', 200],
            ['/buscar', 200],
            ['/search', 200],
            ['/encontre', 200],
            ['/ongs', 200],
            ['/register', 200],
            ['/sobre', 200],

        ];
    }


    /**
     * This is kind of a smoke test
     *
     * @dataProvider providerAllUrisWithResponseCode
     **/
    public function testApplicationUriResponses($uri, $responseCode)
    {
        print sprintf('checking URI : %s - to be %d - %s', $uri, $responseCode, PHP_EOL);
        $response = $this->call('GET', $uri);
        $this->assertEquals($responseCode, $response->status());
    }

}
