<?php

use Faker\Factory as Faker;
use App\Models\Ajuda;
use App\Repositories\AjudaRepository;

trait MakeAjudaTrait
{
    /**
     * Create fake instance of Ajuda and save it in database
     *
     * @param array $ajudaFields
     * @return Ajuda
     */
    public function makeAjuda($ajudaFields = [])
    {
        /** @var AjudaRepository $ajudaRepo */
        $ajudaRepo = App::make(AjudaRepository::class);
        $theme = $this->fakeAjudaData($ajudaFields);
        return $ajudaRepo->create($theme);
    }

    /**
     * Get fake instance of Ajuda
     *
     * @param array $ajudaFields
     * @return Ajuda
     */
    public function fakeAjuda($ajudaFields = [])
    {
        return new Ajuda($this->fakeAjudaData($ajudaFields));
    }

    /**
     * Get fake data of Ajuda
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAjudaData($ajudaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'titulo' => $fake->word,
            'descricao' => $fake->text,
            'foto' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $ajudaFields);
    }
}
