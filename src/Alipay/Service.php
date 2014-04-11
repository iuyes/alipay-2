<?php namespace Alipay;

class Service {

    protected $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public static function make($options)
    {
        return new static($options);
    }

    public function create_partner_trade_by_buyer_url($sign)
    {
        $data = array_merge($this->options, [
            'sign_type' => 'MD5',
            'sign'      => $sign->generate($this->options)
        ]);
        return join('?', [gateway_url(), http_build_query($data)]);
    }
}
