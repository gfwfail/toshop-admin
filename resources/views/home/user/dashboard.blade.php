@extends('layouts.user')

@section('panelcontent')
    @inject('account', 'App\Services\AccountService')

    <div class="col-md-9 user-panel">

           <table class="table table-striped">
            <thead>
            <tr>
                <th>Pay</th>
                <th>Income</th>
                <th>Description</th>
                <th>Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            ?>
            @foreach($account->transactions(Auth::user()->id) as $transaction)
                <tr>
                    <td>{{int2currency($transaction->credit)}}</td>
                    <td>{{int2currency($transaction->debit)}}</td>
                    <td>ID:{{$transaction->source_id.' - '.$transaction->description}}</td>
                    <td>{{$transaction->created_at}}</td>

                </tr>
                <?php $i++ ?>
            @endforeach
            @if(!$i)
                <tr>
                    <td colspan="4">No history.</td>
                </tr>
            @endif
            </tbody>
        </table></div>



@endsection