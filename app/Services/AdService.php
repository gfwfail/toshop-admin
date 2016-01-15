<?php

namespace App\Services;


use App\User;
use Cache;
use DB;
use App;

class AdService
{

    public function parse($slug)
    {

        $page = App\Page::whereSlug($slug)->first();


        if (!$page){
            return $slug.' not defined.';
        }

        $content = $page->content;


        $content = preg_replace_callback('[store-(\w*)=(\d*)]',"store_info",$content);

        return $content;
    }

    public function show($slug)
    {
        return Cache::remember(
            'AD-SLUG-'.$slug,
            10,
            function () use ($slug)
            {
                return call_user_func_array(
                    [$this,'parse'],[$slug]
                )?:0;
            }
        );
    }

}