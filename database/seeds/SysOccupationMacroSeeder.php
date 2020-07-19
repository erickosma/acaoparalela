<?php

use Illuminate\Database\Seeder;

class SysOccupationMacroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            \DB::table('sys_occupation_macros')->insert(
                array(
                    0 =>
                        array(
                            'name' => 'Administração, negócios e serviços'
                        ),
                    1 =>
                        array(
                            'name' => 'Artes e Design'
                        ),
                    2 =>
                        array(
                            'name' => 'Ciências Biológicas e da Terra'
                        ),
                    3 =>
                        array(
                            'name' => 'Ciências Sociais e Humanas'
                        ),
                    4 =>
                        array(
                            'name' => 'Ciências Exatas e Informática'
                        ),
                    5 =>
                        array(
                            'name' => 'Comunicação e Informação'
                        ),
                    6 =>
                        array(
                            'name' => 'Engenharia e Produção'
                        ),
                    7 =>
                        array(
                            'name' => 'Outras'
                        ),
                    8 =>
                        array(
                            'name' => 'Saúde e Bem-Estar'
                        ),
                )
            );
        });
    }
}
