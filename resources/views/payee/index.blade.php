@include('partials.master-header')
<div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Add Payee</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'payee_store')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('name','Payee name:') }}
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Name'))}}
                </div>
                <br/>
                {{ Form::submit('Add Payee',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Manage Payees</h3>
            </div>
            @if($payees->count())
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
                        @foreach($payees as $method )
                            <tr>

                                <td>{{ $method->name }}</td>
                                <td>{{ link_to_route('payee_edit','Edit',array($method->id),array('class'=>'btn btn-warning')) }}</td>
                                <td>
                                    {{ Form::open(array('method'=>'get','route'=>array('payee_destroy',$method->id))) }}
                                    {{ Form::submit('Delete',array('class'=>'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info col-md-10" style="margin-top: 15px;">
                    No payees right now
                </div>
            @endif
        </div>
    </div>
@include('partials.master-footer')
