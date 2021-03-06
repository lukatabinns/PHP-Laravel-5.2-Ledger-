@include('partials.master-header')
  <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Add Deposit</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'transaction_store')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('account','Account:') }}
                    {{Form::select('account',array('default' => 'Please Select','class'=>'select-income') + $accounts, 'default')}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('date','Date:') }}
                    {{Form::text('date','',array('class'=>'form-control','placeholder'=>'Date','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('amount','Amount') }}
                    {{ Form::text('amount','',array('class'=>'form-control','placeholder'=>'amount')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('payee','Payee:') }}
                    {{Form::select('payee',array('default' => 'Please Select') + $payees, 'default')}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('category','Category') }}
                    {{ Form::select('category', array('default' => 'Please Select') + $incomes, 'default') }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('method','Method') }}
                    {{ Form::select('method', array('default' => 'Please Select') + $methods, 'default') }}
                </div>
                <br/>
                <div class="control-group">
                    {{ Form::label('address','Address') }}
                    {{ Form::text('address','',array('class'=>'form-control','placeholder'=>'address')) }}
                </div>
                <br/>
                <div class="control-group">
                    {{ Form::label('phone','Phone') }}
                    {{ Form::text('phone','',array('class'=>'form-control','placeholder'=>'phone')) }}
                </div>
                <br/>
                <div class="control-group">
                    {{ Form::label('checkup','Checkup') }}
                    {{ Form::text('checkup','',array('class'=>'form-control','placeholder'=>'checkup')) }}
                </div>
                <br/>
                <div class="control-group">
                    {{ Form::label('reference','Ref #') }}
                    {{ Form::text('ref','',array('class'=>'form-control','placeholder'=>'ref')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('description','Description') }}
                    {{ Form::text('description','',array('class'=>'form-control','placeholder'=>'description')) }}
                </div>
                <br/>
                {{ Form::submit('Add Deposit',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Previous Deposits</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th class="text-right">Amount</th>
                    </tr>
                    @foreach($deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->date }}</td>
                            <td>{{ $deposit->description }}</td>
                            <td class="text-right"><span> {{ $deposit->amount }}</span></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $deposits->links() }}
            </div>
        </div>
    </div>
@include('partials.master-footer')
