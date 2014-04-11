<?php namespace Alipay;

require __DIR__.'/vendor/autoload.php';

$options = [
    'out_trade_no'      => generate_batch_number(),
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

$url = Alipay::make(__DIR__.'/config.yml')->create_partner_trade_by_buyer_url($options);

var_dump($url);
