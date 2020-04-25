<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class SysOccupationAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occupations = 'Administração,
                        Administração Pública,
                        Agronegócios e Agropecuária,
                        Ciências Aeronáuticas,
                        Ciências Atuariais,
                        Ciências Contábeis,
                        Ciências Econômicas,
                        Comércio Exterior,
                        Defesa e Gestão Estratégica Internacional,
                        Gastronomia,
                        Gestão Comercial,
                        Gestão de Recursos Humanos,
                        Gestão de Segurança Privada,
                        Gestão de Seguros,
                        Gestão de Turismo,
                        Gestão Financeira,
                        Gestão Pública,
                        Hotelaria,
                        Logística,
                        Marketing,
                        Negócios Imobiliários,
                        Pilotagem Profissional de Aeronaves,
                        Processos Gerenciais,
                        Segurança Pública,
                        Turismo';

        $this->insertOccupation($occupations, 1);

        $occupations = 'Animação,
                        Arquitetura e Urbanismo,
                        Artes Visuais,
                        Comunicação das Artes do Corpo,
                        Conservação e Restauro,
                        Dança,
                        Design,
                        Design de Games,
                        Design de Interiores,
                        Design de Moda,
                        Design Gráfico,
                        Fotografia,
                        História da Arte,
                        Jogos Digitais,
                        Luteria,
                        Música,
                        Produção Cênica,
                        Produção Fonográfica,
                        Teatro';

        $this->insertOccupation($occupations, 2);

        $occupations = 'Agroecologia,
                        Agronomia,
                        Alimentos,
                        Biocombustíveis,
                        Biotecnologia,
                        Biotecnologia e Bioquímica,
                        Ciência e Tecnologia de Alimentos,
                        Ciências Agrárias,
                        Ciências Biológicas,
                        Ciências Naturais e Exatas,
                        Ecologia,
                        Geofísica,
                        Geologia,
                        Gestão Ambiental,
                        Medicina Veterinária,
                        Meteorologia,
                        Oceanografia,
                        Produção de Bebidas,
                        Produção Sucroalcooleira,
                        Rochas Ornamentais,
                        Zootecnia';

        $this->insertOccupation($occupations, 3);

        $occupations = 'Análise e Desenvolvimento de Sistemas,
                        Astronomia,
                        Banco de Dados,
                        Ciência da Computação,
                        Ciência e Tecnologia,
                        Computação,
                        Estatística,
                        Física,
                        Gestão da Tecnologia da Informação,
                        Informática Biomédica,
                        Matemática,
                        Nanotecnologia,
                        Química,
                        Redes de Computadores,
                        Segurança da Informação,
                        Sistemas de Informação,
                        Sistemas para Internet';

        $this->insertOccupation($occupations, 4);

        $occupations = 'Arqueologia,
                        Ciências do Consumo,
                        Ciências Humanas,
                        Ciências Sociais,
                        Cooperativismo,
                        Direito,
                        Escrita Criativa,
                        Estudos de Gênero e Diversidade,
                        Filosofia,
                        Geografia,
                        Gestão de Cooperativas,
                        História,
                        Letras,
                        Libras,
                        Linguística,
                        Museologia,
                        Pedagogia,
                        Psicopedagogia,
                        Relações Internacionais,
                        Serviço Social,
                        Serviços Judiciários e Notariais,
                        Teologia,
                        Tradutor e Intérprete';

        $this->insertOccupation($occupations, 5);

        $occupations = 'Arquivologia,
                        Biblioteconomia,
                        Cinema e Audiovisual,
                        Comunicação em Mídias Digitais,
                        Comunicação Institucional,
                        Comunicação Organizacional,
                        Educomunicação,
                        Estudos de Mídia,
                        Eventos,
                        Gestão da Informação,
                        Jornalismo,
                        Produção Audiovisual,
                        Produção Cultural,
                        Produção Editorial,
                        Produção Multimídia,
                        Produção Publicitária,
                        Publicidade e Propaganda,
                        Rádio, TV e Internet,
                        Relações Públicas,
                        Secretariado,
                        Secretariado Executivo';

        $this->insertOccupation($occupations, 6);

        $occupations ='Agrimensura,
                        Aquicultura,
                        Automação Industrial,
                        Construção Civil,
                        Construção Naval,
                        Eletrônica Industrial,
                        Eletrotécnica Industrial,
                        Energias Renováveis,
                        Engenharia Acústica,
                        Engenharia Aeronáutica,
                        Engenharia Agrícola,
                        Engenharia Ambiental e Sanitária,
                        Engenharia Biomédica,
                        Engenharia Bioquímica, de Bioprocessos e Biotecnologia,
                        Engenharia Cartográfica e de Agrimensura,
                        Engenharia Civil,
                        Engenharia da Computação,
                        Engenharia de Alimentos,
                        Engenharia de Biossistemas,
                        Engenharia de Controle e Automação,
                        Engenharia de Energia,
                        Engenharia de Inovação,
                        Engenharia de Materiais,
                        Engenharia de Minas,
                        Engenharia de Pesca,
                        Engenharia de Petróleo,
                        Engenharia de Produção,
                        Engenharia de Segurança no Trabalho,
                        Engenharia de Sistemas,
                        Engenharia de Software,
                        Engenharia de Telecomunicações,
                        Engenharia de Transporte e da Mobilidade,
                        Engenharia Elétrica,
                        Engenharia Eletrônica,
                        Engenharia Física,
                        Engenharia Florestal,
                        Engenharia Hídrica,
                        Engenharia Industrial Madeireira,
                        Engenharia Mecânica,
                        Engenharia Mecatrônica,
                        Engenharia Metalúrgica,
                        Engenharia Naval,
                        Engenharia Nuclear,
                        Engenharia Química,
                        Engenharia Têxtil,
                        Fabricação Mecânica,
                        Geoprocessamento,
                        Gestão da Produção Industrial,
                        Gestão da Qualidade,
                        Irrigação e Drenagem,
                        Manutenção de Aeronaves,
                        Manutenção Industrial (T/L),
                        Materiais,
                        Mecatrônica Industrial,
                        Mineração,
                        Papel e Celulose,
                        Petróleo e Gás,
                        Processos Metalúrgicos,
                        Processos Químicos,
                        Produção Têxtil,
                        Saneamento Ambiental,
                        Segurança no Trabalho,
                        Silvicultura,
                        Sistemas Biomédicos,
                        Sistemas de Telecomunicações,
                        Sistemas Elétricos,
                        Sistemas Embarcados,
                        Transporte';

        $this->insertOccupation($occupations, 7);


        $occupations = 'Artes,
                        Biossistemas,
                        Ciência da Terra,
                        Ciência e Economia,
                        Ciência e Tecnologia das Águas/do Mar,
                        Ciências da Natureza e suas Tecnologias,
                        Cultura, Linguagens e Tecnologias Aplicadas,
                        Energia e Sustentabilidade,
                        Humanidades,
                        Linguagens e Códigos e suas Tecnologias,
                        Matemática e Computação e suas Tecnologias,
                        Saúde,
                        Tecnologia da Informação';

        $this->insertOccupation($occupations, 8);

        $occupations = 'Biomedicina,
                        Educação Física,
                        Enfermagem,
                        Esporte,
                        Estética e Cosmética,
                        Farmácia,
                        Fisioterapia,
                        Fonoaudiologia,
                        Gerontologia,
                        Gestão Desportiva e de Lazer,
                        Gestão em Saúde,
                        Gestão Hospitalar,
                        Medicina,
                        Musicoterapia,
                        Naturologia,
                        Nutrição,
                        Obstetrícia,
                        Odontologia,
                        Oftálmica,
                        Optometria,
                        Psicologia,
                        Quiropraxia,
                        Radiologia,
                        Saúde Coletiva,
                        Terapia Ocupacional';

        $this->insertOccupation($occupations, 9);
    }

    /**
     * @param $occupations
     * @param $macro
     */
    protected function insertOccupation($occupations, $macro)
    {
        $occupations = explode(',', $occupations);

        foreach ($occupations as $oc) {
            \DB::table('sys_occupation_areas')->insert([
                'name' => Str::of($oc)->trim(),
                'sys_macro_id' => $macro,
                'created_at' => Date::now()
            ]);
        }
    }
}
