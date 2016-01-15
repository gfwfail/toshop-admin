<?php

namespace App\Services;


use App\User;
use DB;
use App;

class AdService
{

    public function show($slug)
    {


        $page = App\Page::whereSlug($slug)->first();


        if (!$page){
            return $slug.' not defined.';
        }

        $content = $page->content;


        $content = preg_replace_callback('[store-(\w*)=(\d*)]',"store_info",$content);

        return $content;
    }

}