<?php

use Faker\Factory as Faker;
use App\Models\Telefone;
use App\Repositories\TelefoneRepository;

trait MakeTelefoneTrait
{
    /**
     * Create fake instance of Telefone and save it in database
     *
     * @param array $telefoneFields
     * @return Telefone
     */
    public function makeTelefone($telefoneFields = [])
    {
        /** @var TelefoneRepository $telefoneRepo */
        $telefoneRepo = App::make(TelefoneRepository::class);
        $theme = $this->fakeTelefoneData($telefoneFields);
        return $telefoneRepo->create($theme);
    }

    /**
     * Get fake instance of Telefone
     *
     * @param array $telefoneFields
     * @return Telefone
     */
    public function fakeTelefone($telefoneFields = [])
    {
        return new Telefone($this->fakeTelefoneData($telefoneFields));
    }

    /**
     * Get fake data of Telefone
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTelefoneData($telefoneFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'telefone' => $fake->word,
            'tipo' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $telefoneFields);
    }
}
