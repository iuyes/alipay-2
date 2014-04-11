<?php namespace Alipay;

use Symfony\Component\Yaml\Yaml;

class Alipay {

    const VERSION = '0.0.3';
    const CREATE_PARTNER_TRADE_BY_BUYER_REQUIRED_OPTIONS = <<<EOT
service|partner|_input_charset|out_trade_no|subject|payment_type|logistics_type|logistics_fee|logistics_payment|seller_email|price|quantity
EOT;

    protected $pid;
    protected $key;
    protected $email;

    public function __construct($path)
    {
        $config = Yaml::parse($path);
        $this->pid = $config['alipay']['pid'];
        $this->key = $config['alipay']['key'];
        $this->email = $config['alipay']['seller_email'];
    }

    public static function make($path)
    {
        return new static($path);
    }

    public function create_partner_trade_by_buyer_url($options = [])
    {
        $defaults = [
            'service'        => 'create_partner_trade_by_buyer',
            '_input_charset' => 'utf-8',
            'partner'        => $this->pid,
            'seller_email'   => $this->email,
            'payment_type'   => '1'
        ];

        $required_options = explode('|', self::CREATE_PARTNER_TRADE_BY_BUYER_REQUIRED_OPTIONS);

        $options = array_merge($options, $defaults);

        $this->check_required_options($options, $required_options);

        return Service::make($options)->create_partner_trade_by_buyer_url(Sign::make($this->key));
    }

    private function check_required_options($options, $required_options)
    {
        foreach ($required_options as $option) {
            if (! array_key_exists($option, $options)) {
                throw new Exception\OptionRequiredException;
            }
        }
    }
}
