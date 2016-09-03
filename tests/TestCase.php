<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://acaoparalela';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->loadEnvironmentFrom('.env.test');


        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }


    public function setUp()
    {
        parent::setUp();

        $this->createApplication();

        Artisan::call('migrate');
        Artisan::call('db:seed');
        Eloquent::unguard();
    }

    public function tearDown()
    {
        Mockery::close();
        //$this->truncateTablesDb();
        Artisan::call('migrate:reset');
        parent::tearDown();
    }


}
