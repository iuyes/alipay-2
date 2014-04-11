<?php namespace Alipay;

use GuzzleHttp\Client as Remote;

class Notify {

    public function verify($data)
    {
        if (Sign::verify($data)) {
            return Remote::get(notify_url($pid, $notify_id))->getBody == 'true';
        }
        return false;
    }
}
