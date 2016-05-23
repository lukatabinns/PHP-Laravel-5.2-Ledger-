@include('partials.master-header')

<div class="container">
   <div class="col-md-6">
   <h3>Create An account</h3>
     
        {{ Form::open(array('route'=>'account_store')) }}
        @if($errors->any())
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('',$errors->all('<li class="error">:message</li>')) }}
            </div>

        @endif
        <div class="form-group">
            {{ Form::label('account_name','Name of your account:') }}
            {{Form::text('account_name','',array('class'=>'form-control','placeholder'=>'account name', 'required'=>'required'))}}
        </div>
        <div class="form-group">
            {{ Form::label('description','Give a description of your account:') }}
            {{Form::textarea('description','',array('class'=>'ckeditor', 'required'=>'required'))}}
        </div>
        <div class="form-group">
            {{ Form::label('balance','Enter the initial account balance') }}
            {{Form::text('balance','',array('class'=>'form-control','placeholder'=>'initial balance', 'required'=>'required'))}}
        </div>

        {{ Form::submit('Create Account',array('class'=>'btn btn-success')) }}
        <!--<a class="btn btn-warning form-control" href="{{ route('account_index','Cancel',null,array('class'=>'btn btn-warning')) }}">Cancel</a>-->
        {{ Form::close() }}
    </div>
</div>
@include('partials.master-footer')
    