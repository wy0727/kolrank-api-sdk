<?php

namespace Kolrank\Sdk\Api\Api\Weixin;

use Kolrank\Sdk\Api\Kernel\BaseClient;

class Client extends BaseClient
{
    protected $baseUri = 'http://open.koldata.net/wechat/';

    /**
     * get wechat list
     * @param int $page
     * @param int $pageSize
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function wechatList($page = 1, $pageSize = 10)
    {
        $param = [
            'page' => $page,
            'page_size' => $pageSize
        ];

        return $this->httpGet('list', $param);
    }

    /**
     * get wechat info
     * @param $wechatId
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function info($wechatId)
    {
        $param = [
            'wechat_id' => $wechatId
        ];

        return $this->httpGet('info', $param);
    }

    /**
     * batch get wechat info
     * @param $wechatId
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function batchInfo($wechatId)
    {
        $param = [
            'wechat_id' => $wechatId
        ];

        return $this->httpPost('batch/info', $param);
    }

    /**
     * get article list
     * @param $wechatId
     * @param int $page
     * @param int $pageSize
     * @param int $sort
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function articles($wechatId, $page = 1, $pageSize = 10, $sort = 0)
    {
        $param = [
            'wechat_id' => $wechatId,
            'page' => $page,
            'page_size' => $pageSize,
            'sort' => $sort
        ];

        return $this->httpGet('articles', $param);
    }

    /**
     * get article info
     * @param $url
     * @param bool $encoded
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function articleInfo($url, $encoded = false)
    {
        $param = [
            'url' => $encoded ? $url : urlencode($url)
        ];

        return $this->httpGet('article/info', $param);
    }

    /**
     * simple search wechat article
     * @param $keyword
     * @param int $page
     * @param int $pageSize
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function simpleSearch($keyword, $page = 1, $pageSize = 10)
    {
        $param = [
            'keyword' => $keyword,
            'page' => $page,
            'page_size' => $pageSize
        ];

        return $this->httpGet('simple/search', $param);
    }

    /**
     * add wechat account
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
     * delete wechat id
     * @param $wechatId
     */
    public function delete($wechatId)
    {
        $param = [
            'wechat_id' => $wechatId
        ];

        return $this->httpPost('delete', $param);
    }

    /**
     * list all wechat account
     * @param $page
     * @param $pageSize
     * @return array|object|\Psr\Http\Message\ResponseInterface|static
     */
    public function listAll($page, $pageSize)
    {
        $param = [
            'page' => $page,
            'page_size' => $pageSize
        ];

        return $this->httpGet('list/all', $param);
    }

}