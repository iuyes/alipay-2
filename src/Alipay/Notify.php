<?php namespace Alipay;

use GuzzleHttp\Client as Remote;

class Notify {

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public static function make($config)
    {
        return new static($config);
    }

    public function verify($data)
    {
        if (Sign::make($this->config['key'])->verify($data)) {
            return Remote::get(notify_url($this->config['pid'], $data['notify_id']))->getBody == 'true';
        }
        return false;
    }
}
