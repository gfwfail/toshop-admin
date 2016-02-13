<?php

/**
 * Created by PhpStorm.
 * User: luye
 * Date: 16/2/5
 * Time: 下午12:57
 */
abstract class fetch
{
    protected $url;
    protected $apiKey;

    public function __construct($url,$apiKey)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
    }



}