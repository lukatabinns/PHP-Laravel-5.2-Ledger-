
@include('partials.master-header')
    <div class="col-md-6">
        {{ Form::model($category,array('method'=>'post','route'=>array('update_category',$category->id))) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
        <div class="control-group">
            {{ Form::label('name','Name of your account:') }}
            {{Form::text('name', old('name'),array('class'=>'form-control','placeholder'=>'category name'))}}
        </div>
        <div class="control-group">
            {{ Form::label('type','Category Type:') }}
            {{Form::select('type',array('income'=>'Income','expense'=>'Expense'))}}
        </div>
        <br>
        {{ Form::submit('Update Category',array('class'=>'btn btn-success')) }}
        {{ Form::close() }}
    </div>
@include('partials.master-footer')
   