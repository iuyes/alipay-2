<?php namespace Alipay;

class Sign {

    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public static function make($key)
    {
        return new static($key);
    }

    public function generate($params)
    {
        return md5(query_joiner(mix_sort($params)).$this->key);
    }

    public function verify($data)
    {
        $sign = $data['sign'];
        return $this->generate(query_filter($data)) == $sign;
    }
}
