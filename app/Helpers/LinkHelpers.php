<?php
/**
 * Created by PhpStorm.
 * User: luye
 * Date: 15/12/20
 * Time: 下午11:22
 */
function sid_url($url,$sid,$name='sid')
{
    $query = parse_url($url, PHP_URL_QUERY);
    if ($query) {
        $url .= '&'.$name.'='.$sid;
    } else {
        $url .= '?'.$name.'='.$sid;
    }

    return $url;
}

function store_info($matches)
{

//    dd($matches);

    try {
    $store =  \App\Store::find($matches[2]);
    return $store->$matches[1];
        }
    catch (Exception $e){
        return 'Tag-parse-error';
    }
}

function is_active($routeName,$classname = 'active')
{
    if (request()->route()->getName()==$routeName) {
        return $classname;
    }
}