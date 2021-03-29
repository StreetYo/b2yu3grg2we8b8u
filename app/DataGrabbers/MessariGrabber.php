<?php


namespace App\DataGrabbers;


use App\Facades\Json;
use App\Models\MessariDataModel;
use Curl\Curl;

class MessariGrabber
{
    private $curl;
    private $base_url = 'https://data.messari.io/api';

    public function __construct()
    {
        $this->curl = new Curl();
    }

    public function get_coins_list($page = 1, $limit = 500) {
        $limit = $limit > 500 ? 500 : $limit;

        return $this->make_get_request('/v2/assets', [
            'page' => $page,
            'limit' => $limit
        ]);
    }

    private function make_get_request($endpoint, $data = []) {
        $this->curl->get($this->base_url . $endpoint, $data);
        $response = $this->curl->getRawResponse();
        $this->curl->reset();

        if(!Json::isJson($response))
            return false;

        $response = Json::decode($response);

        if(
            key_exists('status', $response) &&
            key_exists('error_code', $response['status'])
        ) return false;

        if(key_exists('data', $response))
            $response = $response['data'];

        return $response;
    }
}
