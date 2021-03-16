<?php

/*
 * This file is part of the zyan/web-link.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

require '../vendor/autoload.php';



use Zyan\WebLink\WebLink;

$urls = [
//    'www.joy127.com',
//    'www.baidu.com',
//    'www.qq.com',
//    "www.94sc.net",
//    "www.qadmin.net",
    "www.dj97.com",
];

foreach ($urls as $url) {
    echo $url.PHP_EOL;
    $link = new WebLink("http://".$url);

    $a = $link->externalLinks();

    print_r($a);
}
