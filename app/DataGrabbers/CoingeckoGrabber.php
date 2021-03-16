<?php


namespace App\DataGrabbers;


use Curl\Curl;

class CoingeckoGrabber
{
    private $curl;
    private $base_url = 'https://api.coingecko.com/api/v3';

    public function __construct()
    {
        $this->curl = new Curl();
    }

    public function get_coins_list() {
        return $this->make_get_request('/coins/list', [
            'include_platform' => 'true'
        ]);
    }

    public function get_coin_data($id) {
        return $this->make_get_request("/coins/{$id}", [
            'localization'   => 'false',
            'developer_data' => 'true',
            'community_data' => 'true'
        ]);
    }

    private function make_get_request($endpoint, $data = []) {
        $this->curl->get($this->base_url . $endpoint, $data);
        $response = $this->curl->getResponse();
        $this->curl->reset();

        return $response;
    }
}
