<?php

use Faker\Factory as Faker;
use App\Models\Endereco;
use App\Repositories\EnderecoRepository;

trait MakeEnderecoTrait
{
    /**
     * Create fake instance of Endereco and save it in database
     *
     * @param array $enderecoFields
     * @return Endereco
     */
    public function makeEndereco($enderecoFields = [])
    {
        /** @var EnderecoRepository $enderecoRepo */
        $enderecoRepo = App::make(EnderecoRepository::class);
        $theme = $this->fakeEnderecoData($enderecoFields);
        return $enderecoRepo->create($theme);
    }

    /**
     * Get fake instance of Endereco
     *
     * @param array $enderecoFields
     * @return Endereco
     */
    public function fakeEndereco($enderecoFields = [])
    {
        return new Endereco($this->fakeEnderecoData($enderecoFields));
    }

    /**
     * Get fake data of Endereco
     *
     * @param array $postFields
     * @return array
     */
    public function fakeEnderecoData($enderecoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'desc' => $fake->text,
            'complemento' => $fake->word,
            'bairro' => $fake->word,
            'cidade_id' => $fake->randomDigitNotNull,
            'pais_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $enderecoFields);
    }
}
