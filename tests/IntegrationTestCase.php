<?php

namespace Tests;

use App\Models\VO\AccessToken;
use App\User;
use Faker\Generator;
use Faker\Provider\en_US\PhoneNumber;
use Faker\Provider\en_US\Text;
use Faker\Provider\Lorem;
use Faker\Provider\pt_BR\Address;
use Faker\Provider\pt_BR\Company;
use Faker\Provider\pt_BR\Internet;
use Faker\Provider\pt_BR\Person;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use JsonMapper;
use JsonMapper_Exception;
use Mockery;
use Symfony\Component\HttpFoundation\Response;

abstract class IntegrationTestCase extends TestCase
{

    protected static $migrationsRun = false;
    protected $rumMigration = true;

    protected $baseUrl;

    protected $resource = "";

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = str_replace("https:", "http:", env("APP_URL", $this->baseUrl));

        $this->createApplication();
    }

    public function tearDown(): void
    {
        $this->beforeApplicationDestroyed(function () {
            DB::disconnect();
        });
        parent::tearDown();
    }

    public function getUri($res)
    {
        return $this->resource . "" . $res;
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     * @throws Exception
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        $this->createDb();

        if (!static::$migrationsRun) {
            Artisan::call('migrate:refresh');
            Artisan::call('migrate');
            if ($this->rumMigration) {
                Artisan::call('db:seed');
            }
            Artisan::call('auth:clear-resets');
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('config:clear');
            Artisan::call('optimize:clear');
            Artisan::call('view:clear');
            static::$migrationsRun = true;
        }
        return $app;
    }

    public function faker()
    {
        $faker = new  Generator();
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Address($faker));
        $faker->addProvider(new Company($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new Text($faker));
        $faker->addProvider(new Lorem($faker));
        $faker->addProvider(new PhoneNumber($faker));
        return $faker;
    }

    /**
     * @param string $email
     * @param string $password
     * @return object
     */
    protected function getToken(string $email, string $password): object
    {
        $response = $this->json('POST', route('login'), [
            "email" => $email,
            "password" => $password,
        ]);

        $response->assertOk()
            ->assertJson(['token_type' => 'bearer'])
            ->assertJson(['expires_in' => '3600'])
            ->assertCookie('token_user');

        return $this->transformAccessToken($response);
    }

    /**
     * @param $response
     * @return AccessToken|object
     */
    protected function transformAccessToken($response)
    {
        $accessToken = new AccessToken();
        try {
            $token = json_decode($response->content());
        } catch (\Exception $ex) {
            $this->fail($ex->getMessage());
            return $accessToken;
        }
        $this->assertArrayHasKey('access_token', (array)$token);

        try {
            $mapper = new JsonMapper();
            $accessToken = $mapper->map($token, new AccessToken());
        } catch (JsonMapper_Exception $e) {
            $this->fail($e->getMessage());
        }
        return $accessToken;
    }

    /**
     * @return AccessToken
     */
    protected function getUserToken(): AccessToken
    {
        $faker = $this->faker();
        $data = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'password'
        ];

        factory(User::class)->create(["email" => $data['email'], "name" => $data['name']]);

        /** @var  $accessToken AccessToken */
        $accessToken = $this->getToken($data['email'], $data['password']);
        return $accessToken;
    }
}
