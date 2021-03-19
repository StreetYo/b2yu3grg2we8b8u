<?php


namespace App\DataGrabbers;


use App\Facades\Json;
use Curl\Curl;

class CoinmarketcapGrabber
{
    private $curl;
    private $base_url = 'https://pro-api.coinmarketcap.com';
    private $api_key = 'cfbc62ef-2570-4b52-84a2-8b12d271f1fe';

    public function __construct()
    {
        $this->curl = new Curl();
    }

    public function get_coins_list() {
        return $this->make_get_request('/v1/cryptocurrency/map', [
            'listing_status' => 'active,untracked'
        ]);
    }

    public function get_coins_data_by_id($ids = []) {
        return $this->get_coins_data_by('id', $ids);
    }

    public function get_coins_data_by_slug($slugs = []) {
        return $this->get_coins_data_by('slug', $slugs);
    }

    public function get_coins_data_by_symbol($symbols = []) {
        return $this->get_coins_data_by('symbol', $symbols);
    }

    public function get_coins_data_by($by, $ids) {
        return $this->make_get_request("/v1/cryptocurrency/info", [
            $by => join(',', $ids)
        ]);
    }

    private function make_get_request($endpoint, $data = []) {
        $this->curl->setHeader('X-CMC_PRO_API_KEY', $this->api_key);
        $this->curl->get($this->base_url . $endpoint, $data);
        $response = $this->curl->getRawResponse();
        $this->curl->reset();

        if(!Json::isJson($response))
            return [];

        $response = Json::decode($response);

        if(key_exists('data', $response))
            $response = $response['data'];

        return $response;
    }
}
