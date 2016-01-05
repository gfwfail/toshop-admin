<?php

namespace App\Services;


use App\User;
use Cache;
use DB;
use Exception;
use Illuminate\Support\Str;

class StatService
{
    public function __call($method, $parameters)
    {

        if (Str::startsWith($method, 'cached')) {
            $method = lcfirst(substr($method, 6));

            if ( (sizeof($parameters)<1 ) || ( !is_numeric($parameters[0]) ) ){
                throw new Exception("invalid cache time");
            }

            if (!method_exists($this, $method)) {
                throw new Exception("unknown method [$method]");
            }

            $cachedTime = array_shift($parameters);
            return Cache::remember(
                'Stat-'.$method.'-'. implode('-',$parameters),
                $cachedTime,
                function () use ($method, $parameters)
                {
                    return call_user_func_array(
                        [$this,$method],$parameters
                    )?:0;
                }
            );
        }

        if (!method_exists($this, $method)) {
            throw new Exception("unknown method [$method]");
        }


    }

    public function test()
    {
        return "hello";
    }

    public function getDirectRefInWeek($userid)
    {

        $fromDate = \Carbon\Carbon::now()->subDays(7)->toDateString(); // or ->format(..)
        $tillDate = \Carbon\Carbon::now()->subDays(0)->toDateString();

        $dataTemplate = [];
        for ($i=7;$i>=0;$i--) {

            $dataTemplate[\Carbon\Carbon::now()->subDays($i)->toDateString()]=0;

        }

     //   dd($fromDate.$tillDate);
        $data = DB::table('users')
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                ->groupBy('date')
                ->whereBetween(DB::raw('DATE(created_at)'),[$fromDate,$tillDate])
                ->orderBy('date')
                ->whereReferrer($userid)
                ->get();

        foreach($data as $d)
        {

            $dataTemplate[$d->date]=$d->count;
        }
        //dd([$data,$dataTemplate]);
        return $dataTemplate;
    }

    public function getRefCount($userId)
    {
        $data = DB::table('user_closure')
                ->groupBy('distance')
                ->where('ancestor_id',$userId)
                ->whereBetween('distance',[1,4])
                ->selectRaw('count(0) as count,distance')
                ->get();


        return $data;
    }
}