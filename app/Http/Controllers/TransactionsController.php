<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user','source')->orderBy('id','desc')->get();
        return view('transaction.index',compact('transactions'));
    }
}
