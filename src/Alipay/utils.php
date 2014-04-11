<?php namespace Alipay;

if (! function_exists('gateway_url')) {
    function gateway_url()
    {
        return 'https://mapi.alipay.com/gateway.do';
    }
}

if (! function_exists('notify_url')) {
    function notify_url($pid, $notify_id)
    {
        return gateway_url().'?service=notify_verify&partner='.join('&notify_id=', [$pid, $notify_id]);
    }
}

if (! function_exists('mix_sort')) {
    function mix_sort($data)
    {
        ksort($data);
        reset($data);
        return $data;
    }
}

if (! function_exists('query_filter')) {
    function query_filter($data)
    {
        unset($data['sign_type']);
        unset($data['sign']);
        return $data;
    }
}

if (! function_exists('query_joiner')) {
    function query_joiner($params)
    {
        $array = [];
        foreach ($params as $k => $v) {
            array_push($array, join('=', [$k, $v]));
        }
        return join('&', $array);
    }
}

if (! function_exists('generate_batch_number')) {
    function generate_batch_number()
    {
        return join('', [strftime('%Y%m%d%H%M%S'), mt_rand(100000, 999999), explode('.', microtime(true))[1]]);
    }
}
