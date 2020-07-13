<?php

namespace App\Services;
use App\Contracts\Read;
use Ixudra\Curl\Facades\Curl;
use App\Proxy;

class BTCService extends Proxy implements Read
{
	private $base = "https://api.blockcypher.com/v1/btc/main";
	public $txhash = "f854aebae95150b379cc1187d848d58225f3c4157fe992bcd166f58bd5063449";

	public function get() 
	{
		$get_url = "{$this->base}/txs/{$this->txhash}";
		$response = Curl::to($get_url)->asJson()->get();
		return $response->addresses;
	}

    public function getByName($name) 
    {
    	$getByName_url = "{$this->base}/addrs/{$name}/balance";
    	$response = Curl::to($getByName_url)->asJson()->get();
		return (string) $response->balance;
    }
}
   