<?php

namespace App\Proxies;
use App\Contracts\Readable;
use Ixudra\Curl\Facades\Curl;
use App\Proxies\Proxy;

class BTCProxy extends Proxy implements Readable
{
	// TODO: should move to .env
	private $base = "https://api.blockcypher.com/v1/btc/main";
	public $txhash = "f854aebae95150b379cc1187d848d58225f3c4157fe992bcd166f58bd5063449";

	public function getAccountList() 
	{
		$getAccountList_url = "{$this->base}/txs/{$this->txhash}";
		$response = Curl::to($getAccountList_url)->asJson()->get();
		return $response->addresses;
	}

    public function getAccountBalance($address) 
    {
    	$getAccountBalance_url = "{$this->base}/addrs/{$address}/balance";
    	$response = Curl::to($getAccountBalance_url)->asJson()->get();
		return (string) $response->balance;
    }
}
   