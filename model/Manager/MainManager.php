<?php

namespace model\Manager;

use model\Abstract\AbstractManager;

class MainManager extends AbstractManager
{
    public function shortenUrl(array $data) : ?string
    {
        $longUrl = $data["short_long"];
        if(empty($longUrl)) return null;
        $newShortId = $this->insertAnything($data, "shorts_main","db", true);
        die(var_dump($newShortId));
    }
/*
    private function makeItShorter(string $longUrl) : string
    {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base = strlen($alphabet);
        $str = '';
        do {
            $str = $alphabet[$num % $base] . $str;
            $num = intdiv($num, $base);
        } while ($num > 0);
        return $str;
    }
*/
}