@extends('layouts.user')

@section('panelcontent')
    @inject('account', 'App\Services\AccountService')

    <div class="col-md-6">
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
        </table>


    </div>
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="lead">Balance:
                </h1>

                <p class="well">
                    <?php
                    echo int2currency($account->balance(Auth::user()->id));
                    ?>
                </p>
                <hr>
                <h4>Refer By Link</h4>

                <p><a href="{{ url('reg/'.Auth::user()->id )}}"> {{ url('reg/'.Auth::user()->id )}} </a>
                </p>

            </div>
        </div>
    </div>


@endsection