<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proxy;

class ETHController extends Controller
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
        $addresses = $this->proxy->get();
        return view('index', [
            'addresses' => $addresses,
            'symbol'    =>  'eth',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $result = $this->proxy->create($name);
        $addresses = $this->proxy->get();
        
        return view('index', [
            'newAddress'   =>  $result->address,
            'addresses' => $addresses,
            'symbol'    =>  'eth',
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
        $balance = $this->proxy->getByName($address);
        return view('show', [
            'address'   =>  $address,
            'balance' => $balance,
            'symbol'    =>  'eth',
        ]);
    }    
}
