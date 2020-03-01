<?php

namespace Tests;

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
use Mockery;

abstract class IntegrationTestCase extends TestCase
{

    protected static $migrationsRun = false;
    protected $rumMigration = true;

    protected $baseUrl;

    protected $resource="";

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->baseUrl =  str_replace("https:","http:",env("APP_URL",$this->baseUrl));

        $this->createApplication();
    }

    public function tearDown(): void
    {
        $this->beforeApplicationDestroyed(function () {
            DB::disconnect();
        });
        parent::tearDown();
    }

    public function getUri($res){
        return $this->resource."".$res;
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
            if($this->rumMigration){
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

}
