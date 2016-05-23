@include('partials.master-header')
   <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Edit Payment Method</h3>
            </div>
            <div class="box-body">
                {{ Form::model($method,array('method'=>'post','route'=>array('paymethod_update',$method->id))) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif
                <div class="control-group">
                    {{ Form::label('name','Payment method name:') }}
                    {{Form::text('name', old('name'),array('class'=>'form-control','placeholder'=>'method name'))}}
                </div>
                <br>
                {{ Form::submit('Update',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@include('partials.master-footer')
