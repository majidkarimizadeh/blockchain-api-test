<?php

namespace App\Contracts;

interface Read
{
	public function get();
    public function getByName($name);
}