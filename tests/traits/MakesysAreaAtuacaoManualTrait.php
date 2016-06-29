<?php

use Faker\Factory as Faker;
use App\Models\sysAreaAtuacaoManual;
use App\Repositories\sysAreaAtuacaoManualRepository;

trait MakesysAreaAtuacaoManualTrait
{
    /**
     * Create fake instance of sysAreaAtuacaoManual and save it in database
     *
     * @param array $sysAreaAtuacaoManualFields
     * @return sysAreaAtuacaoManual
     */
    public function makesysAreaAtuacaoManual($sysAreaAtuacaoManualFields = [])
    {
        /** @var sysAreaAtuacaoManualRepository $sysAreaAtuacaoManualRepo */
        $sysAreaAtuacaoManualRepo = App::make(sysAreaAtuacaoManualRepository::class);
        $theme = $this->fakesysAreaAtuacaoManualData($sysAreaAtuacaoManualFields);
        return $sysAreaAtuacaoManualRepo->create($theme);
    }

    /**
     * Get fake instance of sysAreaAtuacaoManual
     *
     * @param array $sysAreaAtuacaoManualFields
     * @return sysAreaAtuacaoManual
     */
    public function fakesysAreaAtuacaoManual($sysAreaAtuacaoManualFields = [])
    {
        return new sysAreaAtuacaoManual($this->fakesysAreaAtuacaoManualData($sysAreaAtuacaoManualFields));
    }

    /**
     * Get fake data of sysAreaAtuacaoManual
     *
     * @param array $postFields
     * @return array
     */
    public function fakesysAreaAtuacaoManualData($sysAreaAtuacaoManualFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $sysAreaAtuacaoManualFields);
    }
}
