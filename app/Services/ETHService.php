<?php

namespace App\Services;

use Web3\RequestManagers\HttpRequestManager;
use Web3\Providers\HttpProvider;
use App\Contracts\Write;
use App\Contracts\Read;
use App\Models\Account;
use App\Proxy;
use Web3\Web3;

class ETHService extends Proxy implements Read, Write
{
    public $web3;
    public $personal;

    public function __construct()
    {
        $provider = new HttpProvider(new HttpRequestManager('HTTP://127.0.0.1:7545'));
        $this->web3 = new Web3($provider);
        $this->personal = $this->web3->personal;
    }

	public function get() 
	{
        $allAccounts = null;
        $this->web3->eth->accounts(function ($err, $accounts) use (&$allAccounts) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            $allAccounts = $accounts;
        });
		return $allAccounts;
	}

    public function getByName($account) 
    {
        $accountBalance = null;
        $this->web3->eth->getBalance($account, function ($err, $balance) use (&$accountBalance) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            $accountBalance = $balance->toString();
        });
    	return $accountBalance;
    }

    public function create($name) 
    {
        $newAccount = null;
        $this->personal->newAccount($name, function ($err, $account) use (&$newAccount) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            $newAccount = $account;
        });
        $account = Account::create([
            'name' =>   $name,
            'symbol'    =>  'eth',
            'address'   => $newAccount,
        ]);
        return $account;
    }
}
   