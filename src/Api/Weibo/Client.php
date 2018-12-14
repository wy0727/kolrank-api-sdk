<?php

namespace Kolrank\Sdk\Api\Api\Weibo;

use Kolrank\Sdk\Api\Kernel\BaseClient;

class Client extends BaseClient
{
    protected $baseUri = 'http://open.koldata.net/weibo/';

    /**
     * get weibo list
     * @param int $page
     * @param int $pageSize
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function weiboList($page = 1, $pageSize = 10)
    {
        $param = [
            'page' => $page,
            'page_size' => $pageSize,
        ];

        return $this->httpGet('list', $param);
    }

    /**
     * get weibo info
     * @param $weiboId
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function info($weiboId)
    {
        $param = [
            'weibo_id' => $weiboId
        ];

        return $this->httpGet('info', $param);
    }

    /**
     * batch get weibo info
     * @param $weiboId
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function batchInfo($weiboId)
    {
        $param = [
            'weibo_id' => $weiboId
        ];

        return $this->httpPost('batch/info', $param);
    }

    /**
     * get weibo articles by weibo id
     * @param $weiboId
     * @param int $page
     * @param int $pageSize
     * @param int $sort
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function articles($weiboId, $page = 1, $pageSize = 10, $sort = 0)
    {
        $param = [
            'weibo_id' => $weiboId,
            'page' => $page,
            'page_size' => $pageSize,
            'sort_by' => $sort
        ];

        return $this->httpGet('articles', $param);
    }

    /**
     * get weibo artilce info
     * @param $weiboId
     * @param $wid
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function article($weiboId, $wid)
    {
        $param = [
            'weibo_id' => $weiboId,
            'wid' => $wid
        ];

        return $this->httpPost('article', $param);
    }

    /**
     * add weibo account
     * @param $url
     * @param bool $encoded
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function add($url, $encoded = false)
    {
        $param = [
            'url' => $encoded ? $url : urlencode($url)
        ];

        return $this->httpPost('add', $param);
    }

    /**
     * delete weibo account
     * @param $weiboId
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function delete($weiboId)
    {
        $param = [
            'weibo_id' => $weiboId
        ];

        return $this->httpPost('delete', $param);
    }

    /**
     * get all weibo account list
     * @param int $page
     * @param int $pageSize
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function listAll($page = 1, $pageSize = 10)
    {
        $param = [
            'page' => $page,
            'page_size' => $pageSize
        ];
        return $this->httpGet('list/all', $param);
    }
}