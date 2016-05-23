@include('partials.master-header')
  <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Add Animal Food</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'animalfood_store')) }}
              <ul class="errors">
                @foreach($errors->all('<li>:message</li>') as $message)
    
                @endforeach
            </ul>

                <div class="control-group">
                    {{ Form::label('animalfoodtype','Animalfoodtype:') }}
                    {{Form::select('animalfoodtype',array('default' => 'Please Select') + $animalFoodTypes, 'default')}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('brand','Brand of food') }}
                    {{ Form::text('brand','',array('class'=>'form-control','placeholder'=>'brand')) }}
                </div>
                <br/>

                <div class="control-group">
                 {{ Form::label('expiry_date','Expiry Date:') }}
                    {{Form::text('expiry_date','',array('class'=>'form-control','placeholder'=>'Expiry Date','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('amount','Amount') }}
                    {{ Form::text('amount','',array('class'=>'form-control','placeholder'=>'amount')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('date_bought','Date Bought:') }}
                    {{Form::text('date_bought','',array('class'=>'form-control','placeholder'=>'Date Bought','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
                </div>
                <br/>
                {{ Form::submit('Add Animal',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Animal Food Bought</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Date</th>
                        <th>type</th>
                        <th class="text-right">Amount</th>
                    </tr>
                    @foreach($previousFoodTypes as $previousType)
                        <tr>
                            <td>{{ $previousType->date_bought }}</td>
                            <td>{{ $previousType->type }}</td>
                            <td class="text-right"><span> {{ $previousType->amount}}</span></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $previousFoodTypes->links() }}
            </div>
        </div>
    </div>
@include('partials.master-footer')