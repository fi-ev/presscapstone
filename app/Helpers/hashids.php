<?php

use Hashids\Hashids;

if (!function_exists('hashid_encode')) {
    function hashid_encode($id)
    {
        $hashids = new Hashids(config('hashids.salt'), config('hashids.length'), config('hashids.alphabet'));
        return $hashids->encode($id);
    }
}

if (!function_exists('hashid_decode')) {
    function hashid_decode($encodedId)
    {
        $hashids = new Hashids(config('hashids.salt'), config('hashids.length'), config('hashids.alphabet'));
        return $hashids->decode($encodedId);
    }
}
