<?php

namespace model\Manager;

use model\Abstract\AbstractManager;

class MainManager extends AbstractManager
{
    public function shortenUrl(array $data) : ?string
    {

        if(empty($data["short_long"])) return null;
        $newId = $this->insertAnything($data, "shorts_main","db", true);
        $shorty["short_short"] = $this->makeItShorter($newId);
        $addShort = $this->updateAnything($shorty, "short_id", $newId, "shorts_main");
        if(!$addShort || !$newId) return null;

        return $shorty["short_short"];

    }

    public function getLongUrl(string $shortUrl): ?string
    {
        $stmt = $this->db->prepare("SELECT * FROM shorts_main WHERE short_short = :shortUrl");
        $stmt->execute(["shortUrl" => $shortUrl]);
        $result = $stmt->fetch();
        if(!$result) return null;
        return $result["short_long"];
    }

    public function incrementCounter(string $shortUrl) : void
    {
        $stmt = $this->db->prepare("UPDATE shorts_main SET short_usage = short_usage + 1 WHERE short_short = :shortUrl");
        $stmt->execute(["shortUrl" => $shortUrl]);
    }

    private function makeItShorter(string $indexValue): string
    {
        $num = (intval($indexValue) + 1) * OBS_VALUE;
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base = strlen($alphabet);
        $str = '';

        do {
            $str = $alphabet[$num % $base] . $str;
            $num = intdiv($num, $base);
        } while ($num > 0);

        return $str;
    }

}