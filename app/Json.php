<?php


namespace App;


class Json
{
    public function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public function decode($json, $is_array = true) {
        return json_decode($json, $is_array);
    }

    public function encode($data) {
        return json_encode($data);
    }
}
