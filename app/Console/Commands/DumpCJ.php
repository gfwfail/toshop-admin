<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class DumpCJ extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:cj  {start} {end}';

    /**
     *
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch data from cj web service.';


    public function query($start, $end)
    {

        $url = 'https://commission-detail.api.cj.com/v3/commissions?date-type=event&start-date='.$start.'&end-date='.$end;
        //初始化curl
        $ch = curl_init();
        $headers = [
            'authorization: '.config('api.cj.authorization')
        ];
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $res = curl_exec($ch);
        curl_close($ch);
        $this->info('Loaded');

        $xml=simplexml_load_string($res);
        //dd($xml);
        $a='commission-amount';
        foreach ($xml->commissions->commission as $c) {
            $cash =  ( (double)$c->$a*100);
            $user = explode('W',$c->sid)[0];

            $this->info( 'User id:'.$user.' added '. int2currency($cash)  );

            \Account::refundToReferrer($user,$cash,'cash back');


        }
        return $xml;
    }


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start_date = $this->argument('start');
        $end_date = $this->argument('end');
       $this->query($start_date,$end_date);
      //  $this->info(PHP_EOL.$this->query($start_date,$end_date).PHP_EOL);
    }
}
