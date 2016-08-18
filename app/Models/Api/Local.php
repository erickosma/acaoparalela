<?php
/**
 * Created by PhpStorm.
 * User: zoy
 * Date: 09/08/16
 * Time: 21:53
 */

namespace App\Models\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;


/**
 * Class Local
 *
 * Tratr o resorce
 * tratar url
 *
 * @package App\Models\Api
 */
class Local
{


    protected $client;
    private $methode;


    public function __construct()
    {

    }

    public function get($resource)
    {
        $this->methode = "GET";
        return $this->process($resource);
    }

    public function delete()
    {

    }

    public function update()
    {

    }

    public function create()
    {

    }

    protected function process($resource)
    {
        $retorno =[];
        try {
            $url = $this->getUrl();
            $client = new Client(['base_uri' => $url]);

            $response = $client->request($this->methode, $resource);

            return $response->getBody()->getContents();

        } catch (ClientException $e) {

            $retorno['message'] =  $e->getMessage();
            $retorno['method']  =  $e->getRequest()->getMethod();
            $retorno['success'] = false;
            $retorno['code'] =  $e->getCode();
            return $retorno;
        } catch (Guzzle\Http\Exception\CurlException $e) {

            $retorno['message'] =  $e->getMessage();
            $retorno['success'] = false;
            $retorno['code'] =  $e->getCode();
            return $retorno;
        } catch (Exception $e) {


            $retorno['message'] =  $e->getMessage();
            $retorno['success'] = false;
            $retorno['code'] =  $e->getCode();
            return $retorno;
        } catch (RequestException $e) {
            $retorno['message'] =   $e->getMessage();
            $retorno['method']  =  $e->getRequest()->getMethod();
            $retorno['success'] = false;
            $retorno['code'] =  $e->getCode();
            return $retorno;
        }

    }

    protected function getUrl()
    {
        return config('apilocal.protocol') . '//' . config('apilocal.host') . '/' .
        config('apilocal.prefix') . '/' . config('apilocal.verssion') . '/';
    }

    protected function log(){

    }

}