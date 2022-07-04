<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class RapidApiController extends Controller
{
    private $api_key;
    private $base_url;
    private $client;
    private $host;

    /**
     * Initialization of Controller Requirements;
     */
    public function __construct() {
        $this->api_key = env('RAPID_API_KEY','cf3b92a363msh561a956bd1e5f52p1d72a2jsn030773da43cd');
        $this->base_url = env('RAPID_API_URL', 'https://exercisedb.p.rapidapi.com/');
        $this->client = new Client();
        $this->host = 'exercisedb.p.rapidapi.com';
    }

    /**
     * @param $url
     * @param $data
     * @return array
     * @throws GuzzleException
     */
    private function SendPostRequest($url, $data) {
        $url = $this->base_url.$url;
        try {
            $request = $this->client->post($url, $data);
            $response = array(
                'success' => true,
                'body' => json_decode($request->getBody(), true)
            );
        } catch (RequestException $exception) {
            if ($exception->hasResponse()) {
                $response = array(
                    'success' => false,
                    'error' => json_decode($exception->getResponse()->getBody(), true)
                );
            } else {
                $response = array(
                    'success' => false,
                    'error' => 'Error not defined'
                );
            }
        }
        return $response;
    }

    /**
     * @param $url
     * @param $data
     * @return array
     * @throws GuzzleException
     */
    private function SendGetRequest($url, $data) {
        $url = $this->base_url.$url;
        try {
            $request = $this->client->get($url, $data);
            $response = array(
                'success' => true,
                'data' => json_decode($request->getBody(), true)
            );
        } catch (RequestException $exception) {
            if ($exception->hasResponse()) {
                $response = array(
                    'success' => false,
                    'error' => json_decode($exception->getResponse()->getBody(), true)
            );
            } else {
                $response = array(
                    'success' => false,
                    'error' => 'Error not defined'
                );
            }
        }
        return $response;
    }

    public function GetBodyPartsList() {
        $params = array(
            'headers' => array(
                'X-RapidAPI-Key' => $this->api_key,
                'X-RapidAPI-Host' => $this->host
            )
        );
        $response = $this->SendGetRequest('exercises/bodyPartList', $params);
        dd($response);
    }

    public function GetByBodyParts($part) {
        $params = array(
            'headers' => array(
                'X-RapidAPI-Key' => $this->api_key,
                'X-RapidAPI-Host' => $this->host
            )
        );
        $response = $this->SendGetRequest('exercises/bodyPart/'.$part, $params);
        dd($response);
    }

    public function GetByID($id)
    {
        $params = array(
            'headers' => array(
                'X-RapidAPI-Key' => $this->api_key,
                'X-RapidAPI-Host' => $this->host
            )
        );
        $response = $this->SendGetRequest('exercises/exercise/'.$id, $params);
        dd($response);
    }
    public function GetAll()
    {
        $params = array(
            'headers' => array(
                'X-RapidAPI-Key' => $this->api_key,
                'X-RapidAPI-Host' => $this->host
            )
        );
        $response = $this->SendGetRequest('exercises', $params);
        dd(json_encode($response['data']));
    }
}
