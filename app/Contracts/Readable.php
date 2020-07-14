<?php

namespace App\Contracts;

interface Readable
{
	public function getAccountList();
    public function getAccountBalance($address);
}