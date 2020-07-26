<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RouteTest extends TestCase
{

    /**
     * @var \App\User
     */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        if ($response->getStatusCode() !== 200) {
            Storage::put("tests/index.html", $response->getContent());
        }
        $response->assertStatus(200);
    }


    public function testSession()
    {
        $this->withSession(['foo' => 'bar'])->get("/");
        $this->assertFalse(auth()->check());
    }

    /**
     * @return array
     */
    public function publicRotasUrl()
    {
        return [
            //web
            ['/', 200, "get"],
            ['/login', 200, "get"],
            ['/header', 200, "get"],
        ];
    }

    /**
     * @return array
     */
    public function loggedRotasUrl()
    {
        return [
            //web
            ['/perfil', 200, "get"],
            ['/perfil/ong', 200, "get"],
            ['/perfil/voluntario', 200, "get"],
            //api
            ['/api/v1/auth/me', 200, "get"],
            ['/api/v1/auth/logout', 200, "get"],
        ];
    }

    /**
     * Usa o array rotasUrl pra testar url
     *
     *
     * @dataProvider publicRotasUrl
     * @group  app
     **/
    public function testApplicationUriResponses($uri, $responseCode, $method = "get")
    {
        print sprintf('checking URI : %s - to be %d - %s', $uri, $responseCode, PHP_EOL);
        $response = $this->call($method, $uri);
        //se falhar grava o erro
        if ($response->getStatusCode() !== $responseCode) {
            print sprintf('= %d %s', $response->getStatusCode() , PHP_EOL);
            Storage::put("tests/" . trim($uri) . ".html", $response->getContent());
        }
        $response->assertStatus($responseCode);
    }

    /**
     *
     * @dataProvider loggedRotasUrl
     * @group  app
     **/
    public function testApplicationUriWithLoggedUserAndReturnResponses($uri, $responseCode, $method = "get")
    {
        /*$uri = str_replace(array("%id", "%id_user%", "%user%"), array($this->anuncio->id, $this->anuncio->nome, $this->user->id), $uri);
        */
        print sprintf('checking URI ADMIN: %s - to be  %d - %s', $uri, $responseCode, PHP_EOL);

        auth()->login($this->user);
        $server = $this->transformHeadersToServerVars([]);
        $response = $this->actingAs($this->user)
            ->call(strtoupper($method), $uri, [], [], [], $server);
        //se falhar grava o erro
        if ($response->getStatusCode() !== $responseCode) {
            print sprintf('= %d %s', $response->getStatusCode(), PHP_EOL);
            Storage::put("tests/" . trim($uri) . ".html", $response->getContent());
        }
        $response->assertStatus($responseCode);
    }
}
