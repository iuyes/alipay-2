<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;
use Alipay\Alipay;

$config = Yaml::parse(__DIR__.'/config.yml');

$request = Request::createFromGlobals();

$opts = [
    'out_trade_no'      => \Alipay\generate_batch_number(),
    'subject'           => 'Alipay Service.',
    'logistics_type'    => 'DIRECT',
    'logistics_fee'     => '0',
    'logistics_payment' => 'SELLER_PAY',
    'price'             => '1.0',
    'quantity'          => 1,
    'discount'          => '2.0',
    'return_url'        => 'http://nhn.io/orders/201404111047272342066627',
    'notify_url'        => 'http://nhn.io/orders/201404111047272342066627/alipay_notify'
];

// Alipay::make($config);

// Alipay::instance()->create_partner_trade_by_buyer_url($opts);

// echo Alipay::VERSION;

echo Alipay::make(__DIR__.'/config.yml')->create_partner_trade_by_buyer_url($opts);

/*
https://mapi.alipay.com/gateway.do?out_trade_no=201407021933062937659276&subject=Alipay+Service.&logistics_type=DIRECT&logistics_fee=0&logistics_payment=SELLER_PAY&price=1.0&quantity=1&discount=2.0&return_url=http%3A%2F%2Fnhn.io%2Forders%2F201404111047272342066627&notify_url=http%3A%2F%2Fnhn.io%2Forders%2F201404111047272342066627%2Falipay_notify&service=create_partner_trade_by_buyer&_input_charset=utf-8&partner=&seller_email=menglr%40live.com&payment_type=1&sign_type=MD5&sign=302b53ffe36550cc30009247bfb9b8e3%
*/
