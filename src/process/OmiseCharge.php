<?php

namespace klongchu\Omise\process;

use klongchu\Omise\process\Omise;
use Illuminate\Support\Facades\Http;

class OmiseCharge extends Omise
{
    public static function create(array $data)
    {
        static::init();

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(self::$secret_key)
        ])->post(self::$url . '/charges', $data);

        return $response->json();
    }
}
