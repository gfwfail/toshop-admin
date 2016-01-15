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

        return $page?$page->content:$slug.' not defined';
    }

}