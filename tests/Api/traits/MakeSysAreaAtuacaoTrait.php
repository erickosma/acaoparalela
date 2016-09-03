<?php

namespace Test;

use Faker\Factory as Faker;
use App\Models\SysAreaAtuacao;
use App\Repositories\SysAreaAtuacaoRepository;

trait MakeSysAreaAtuacaoTrait
{
    /**
     * Create fake instance of SysAreaAtuacao and save it in database
     *
     * @param array $sysAreaAtuacaoFields
     * @return SysAreaAtuacao
     */
    public function makeSysAreaAtuacao($sysAreaAtuacaoFields = [])
    {
        /** @var SysAreaAtuacaoRepository $sysAreaAtuacaoRepo */
        $sysAreaAtuacaoRepo = app()->make(SysAreaAtuacaoRepository::class);
        $theme = $this->fakeSysAreaAtuacaoData($sysAreaAtuacaoFields);
        return $sysAreaAtuacaoRepo->create($theme);
    }

    /**
     * Get fake instance of SysAreaAtuacao
     *
     * @param array $sysAreaAtuacaoFields
     * @return SysAreaAtuacao
     */
    public function fakeSysAreaAtuacao($sysAreaAtuacaoFields = [])
    {
        return new SysAreaAtuacao($this->fakeSysAreaAtuacaoData($sysAreaAtuacaoFields));
    }

    /**
     * Get fake data of SysAreaAtuacao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSysAreaAtuacaoData($sysAreaAtuacaoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word
        ], $sysAreaAtuacaoFields);
    }
}
