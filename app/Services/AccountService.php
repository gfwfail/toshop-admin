<?php
/**
 * Created by PhpStorm.
 * User: helmutye
 * Date: 15/10/5
 * Time: 上午1:52
 */

namespace App\Services;


use App\User;
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


        $depth=['1','0.2','0.1','0.06','0.04'];
        $this->debit($userid, 0 ,$amount ,' Cash back');

        $referrer = User::find($userid)->referrer;




        for ($i=1; $i<5; $i++) {
            if  ( (User::whereId($referrer)->count())>0 ) {

                $this->debit($referrer,$userid,$amount*$depth[$i],' Cash back');

                $referrer = User::find($referrer)->referrer;
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