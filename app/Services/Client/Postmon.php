<?php


namespace App\Services\Client;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Postmon
{
    private $timeoutSeconds = 2;

    private $url = 'https://api.postmon.com.br/v1/cep/';

    private $headers = ['accept' => 'application/json, text/javascript, */*; q=0.01',
        'user-agent' => 'Mozilla/5.0 (X11; Fedora; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36'];


    /**
     * @param $cep
     * @return  \Illuminate\Http\Client\Response
     */
    public function getAddresses(string $cep)
    {
        $response = Http::timeout($this->timeoutSeconds)
            ->withHeaders($this->headers)
            ->get($this->url . $cep);

        try {
            $response = Http::timeout($this->timeoutSeconds)
                ->withHeaders($this->headers)
                ->get($this->url . $cep);
        } catch (\Illuminate\Http\Client\ConnectionException $connectionException) {
            Log::error('Timeout Not found CEP:' . $cep . '; ' . $connectionException->getMessage() .'; status:'. $response->status());
        } catch (\Exception $e) {
            Log::error('Timeout Not found CEP:' . $cep . '; ' . $e->getMessage() .'; status:'. $response->status());
        }

        if(!$response->successful()) {
            Log::warning('Not found CEP:' . $cep  .'; status:'.  $response->getStatusCode());
        }

        return $response;
    }


}
