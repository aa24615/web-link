<?php

namespace Zyan\WebLink\Util;

class Tools
{
    public static function urlInfo(string $url)
    {
        $url = strtolower($url);
        $parse = parse_url($url);

        if (isset($parse['scheme']) && isset($parse['host'])) {
            $data['isHost'] = true;
        } else {
            $data['isHost'] = false;
        }

        $host = $parse['host'] ?? '';

        $data['host'] = trim(urldecode($host));

        return $data;
    }
}
