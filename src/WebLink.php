<?php


/*
 * This file is part of the zyan/web-link.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\WebLink;

use GuzzleHttp\Client;
use QL\QueryList;
use Zyan\WebLink\Util\Tools;

/**
 * Class WebLink.
 *
 * @package Php127
 *
 * @author 读心印 <aa24615@qq.com>
 */
class WebLink
{
    protected $html = null;
    protected $url = null;
    protected $host = null;
    protected $ql = null;


    /**
     * WebLink constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }

    /**
     * setUrl.
     *
     * @param string $url
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function setUrl(string $url)
    {
        $this->ql = null;
        $this->url = $url;
        $this->host = Tools::urlInfo($url)['host'];
        $this->setHtml($url);
    }

    /**
     * setHtml.
     *
     * @param string $url
     *
     * @return void
     *
     * @author 读心印 <aa24615@qq.com>
     */
    private function setHtml(string $url)
    {
        $http = new Client([
            'timeout' => 10,
            'http_errors' => false,
            'verify' => false,
        ]);

        $response = $http->get($url);

        $this->html = $response->getBody()->getContents();
    }

    /**
     * ql.
     *
     * @return QueryList
     *
     * @author 读心印 <aa24615@qq.com>
     */

    public function ql()
    {
        if (is_null($this->ql)) {
            $this->ql = QueryList::html($this->html);
        }

        return $this->ql;
    }



    public function externalLinks()
    {
        $list = $this->ql()->find('a')->htmlOuters();

        $data = [];
        foreach ($list as $val) {
            $a = QueryList::html($val)->find('a');

            $url = $a->attr('href');
            $name = $a->text();

            if (!empty($url)) {
                $info = Tools::urlInfo($url);

                if ($info['isHost'] && $info['host'] !== $this->host) {
                    $data[] = [
                        'name' => $name,
                        'url' => $url
                    ];
                }
            }
        }

        return $data;
    }
}
