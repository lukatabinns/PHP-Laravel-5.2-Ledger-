@include('partials.master-header')
  <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Add Animals</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'animal_store')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('animaltype','Animaltype:') }}
                    {{Form::select('animaltype',array('default' => 'Please Select') + $animalTypes, 'default')}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('name','Breed of Animal') }}
                    {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'breed')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('age','Age') }}
                    {{ Form::text('age','',array('class'=>'form-control','placeholder'=>'age')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('sex','Sex') }}
                    {{Form::select('sex', array('male' => 'male', 'female' => 'female'), 'male' )}}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('vaccination','Vaccination') }}
                    {{ Form::text('vaccination','',array('class'=>'form-control','placeholder'=>'vaccination')) }}
                </div>
                <br/>

                <div class="control-group">
                    {{ Form::label('amount','amount') }}
                    {{ Form::text('amount','',array('class'=>'form-control','placeholder'=>'amount')) }}
                </div>
                </br>

                <div class="control-group">
                    {{ Form::label('date','Date:') }}
                    {{Form::text('date','',array('class'=>'form-control','placeholder'=>'Date','data-beatpicker'=>'true',' data-beatpicker-position'=>'['*','*']','data-beatpicker-format'=>"['YYYY','MM','DD'],separator:'/'",'data-beatpicker-module'=>"gotoDate"))}}
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
                <h3 class="box-title">Previous Animals</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Date</th>
                        <th>type</th>
                        <th class="text-right">Amount</th>
                    </tr>
                    @foreach($previousTypes as $previousType)
                        <tr>
                            <td>{{ $previousType->date }}</td>
                            <td>{{ $previousType->type }}</td>
                            <td class="text-right"><span> {{ $previousType->amount}}</span></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $previousTypes->links() }}
            </div>
        </div>
    </div>
@include('partials.master-footer')