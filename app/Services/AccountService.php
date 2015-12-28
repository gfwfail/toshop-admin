<?php
/**
 * Created by PhpStorm.
 * User: helmutye
 * Date: 15/10/5
 * Time: 上午1:52
 */

namespace App\Services;


use DB;
use App;
class AccountService
{

    public function debit($userId, $sourceId, $amount, $description ){


        $time = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('transactions')->insert([
            'user_id' => $userId,
            'source_id' => $sourceId,
            'debit'=>$amount,
            'description'=> $description,
            'created_at' =>$time,
            'updated_at'=>$time
        ]);

    }


    public function refundToReferrer($userid,$amount) {

        $user = \App::make('App\Repositories\Contracts\UserRepository');

        $depth=['0.3','0.1','0.05','0.025','0.01'];

        $referrer = $user->find($userid)->referrer;


        for ($i=0; $i<5; $i++) {
            if  ($user->isExist($referrer)) {

                $this->debit($referrer,$userid,$amount*0.05*$depth[$i],'下线返利');

                $referrer = $user->find($referrer)->referrer;
            }
            else {
                break;
            }


        }




    }

    public function balance($userId){
        $debit =  DB::table('transactions')
            ->where('user_id',$userId)
            ->sum('debit');

        $credit =  DB::table('transactions')
            ->where('user_id',$userId)
            ->sum('credit');

        return $debit - $credit;
    }

    public function transactions($userId){
        $transactions =  DB::table('transactions')
            ->where('user_id',$userId)
            ->get();

        return $transactions;
    }

}