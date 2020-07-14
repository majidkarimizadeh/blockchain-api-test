<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proxies\Proxy;

class BTCController extends Controller
{
    public $proxy;

    public function __construct(Proxy $proxy)
    {
        $this->proxy = $proxy;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = $this->proxy->getAccountList();
        return view('index', [
            'addresses' => $addresses,
            'symbol'    =>  'btc',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($address)
    {
        $balance = $this->proxy->getAccountBalance($address);
        return view('show', [
            'address'   =>  $address,
            'balance' => $balance,
            'symbol'    =>  'btc',
        ]);
    }
}
