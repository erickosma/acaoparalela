<?php

namespace App\Http\Controllers;


use App\Repositories\ProfileRepository;
use App\Models\Util\UtilController;


use Route;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;


class ProfileController extends Controller
{
    //

    protected $perfilRepository;


    public function __construct(ProfileRepository $perfilRepository)
    {
        $this->perfilRepository = $perfilRepository;
    }

    /**
     * @param ProfileRepository $perfilRepository
     * @return string
     */
    public function complete()
    {
        $redirect = $this->perfilRepository->checkProfileComplete();
        return redirect()->action( UtilController::getName().'@'. $redirect);
    }


    public function escolha()
    {
        $profile = $this->perfilRepository->profileUser()->first();
        if (!empty($profile->usuario_ong)) {
            $redirect = $this->perfilRepository->redirectUser($profile->usuario_ong);
        }
        if (!empty($redirect) && $redirect != "escolha") {
            return redirect()->action('PerfilController@' . $redirect);
        }

        return view('profile.escolha');
    }

    public function voluntario()
    {
    }

    public function ong()
    {
       /* $request = Request::create('/api/vi/userongs', 'GET');
       /* $instance = json_decode(Route::dispatch($request)->getContent());
        dd($instance);

       $this->post(route('share.upload'), [
            'type' => 'video'
        ], ['Authorization' => 'Bearer ' . $token]);
*/
        //$response  = $client->get('userongs');


        try {
            try {
                $token = "teste";
                $url = config('apilocal.protocol').'//'.config('apilocal.host').'/'.
                        config('apilocal.prefix').'/'.config('apilocal.verssion').'/';
                $client = new Client(['base_uri' => $url ]);

                $response = $client->request('GET', 'userongs');

                return  $response->getBody()->getContents();

            } catch (ClientException $e) {

                echo $e->getMessage() . "\n";
                echo $e->getRequest()->getMethod();
                $str = "Error html: " . $e->getMessage(). "- Code: ".$e->getCode();
                //$this->site_links[$this->url]['status_code'] = '404';
                return $str;
            }
            catch (RequestException $e) {

                echo $e->getMessage() . "\n";
                echo $e->getRequest()->getMethod();
                $str = "Error html: " . $e->getMessage(). "- Code: ".$e->getCode();
                //$this->site_links[$this->url]['status_code'] = '404';
                return $str;
            }


        }
        catch (Guzzle\Http\Exception\CurlException $ex) {

            $str ="CURL exception: " .$ex->getMessage(). "- Code: ".$ex->getCode();
            //$this->site_links[$this->url]['status_code'] = '404';
            return $str;
        } catch (Exception $ex) {
            $str = "Error retrieving data from link: " . $ex->getMessage(). "- Code: ".$ex->getCode();
            //$this->site_links[$this->url]['status_code'] = '404';
            return $str;
        }
    }
}
