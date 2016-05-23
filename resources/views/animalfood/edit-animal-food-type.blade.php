@include('partials.master-header')
    <div class="col-md-6">
        {{ Form::model($animalFoodType,array('method'=>'post','route'=>array('animalfoodtype_update',$animalFoodType->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','Name of animal food type:') }}
            {{Form::text('name', old('name'),array('class'=>'form-control','placeholder'=>'category name'))}}
        </div>
        <br>
        {{ Form::submit('Update animal food type',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@include('partials.master-footer')