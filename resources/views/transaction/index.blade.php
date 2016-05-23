@include('partials.master-header')

    <div class="col-md-12">

       <a href="{{ route('account_create') }}">Create a new account</a>
    </div>

    <div class="col-md-12">
        <div class="row">
            <br/>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Transactions history</h3>
                </div>


                @if($transactions->count())
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="center-text">
                                <th style="width: 9%;">Date</th>
                                <th>Account</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Payer</th>
                                <th>Payee</th>
                                <th>Method</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Checkup</th>
                                <th>Ref</th>
                                <th>Description</th>
                                <th>Dr.</th>
                                <th>Cr.</th>
                                <th>Balance</th>
                            </tr>
                            </thead>
                            <tbody class="center-text">
                            @foreach($transactions as $transaction)
                                <tr>

                                    <td>{{ $transaction->date }}</td>
                                    <td>{{ $transaction->account  }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->category }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->payer }}</td>
                                    <td>{{ $transaction->payee }}</td>
                                    <td>{{ $transaction->method }}</td>
                                    <td>{{ $transaction->phone }}</td>
                                    <td>{{ $transaction->address }}</td>
                                    <td>{{ $transaction->checkup }}</td>
                                    <td>{{ $transaction->ref }}</td>
                                    <td>{{ $transaction->description }}</td>
                                    <td>{{ $transaction->dr }}</td>
                                    <td>{{ $transaction->cr }}</td>
                                    <td>{{ $transaction->bal }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-md-12">
                {{ $transactions->links() }}
            </div>
            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No transactions are found.
                </div>
            @endif
        </div>
    </div>
@include('partials.master-footer')
