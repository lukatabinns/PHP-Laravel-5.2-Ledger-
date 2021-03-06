@include('partials.master-header')
  <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Add A Payment Method</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'paymethod_store')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('name','Payment method name:') }}
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Name'))}}
                </div>
                <br/>
                {{ Form::submit('Create',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Manage Payment Methods</h3>
            </div>
            @if($methods->count())
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($methods as $method )
                            <tr>

                                <td>{{ $method->name }}</td>
                                <td>{{ link_to_route('paymethod_edit','Edit',array($method->id),array('class'=>'btn btn-warning')) }}</td>
                                <td>
                                    {{ Form::open(array('method'=>'get','route'=>array('paymethod_destroy',$method->id))) }}
                                    {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No payment methods are assigned
                </div>
            @endif
        </div>
    </div>
@include('partials.master-footer')
