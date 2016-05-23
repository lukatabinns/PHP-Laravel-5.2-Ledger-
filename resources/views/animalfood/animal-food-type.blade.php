@include('partials.master-header')
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Create a New Animal Food Type</h3>
            </div>
            <div class="box-body">
                {{ Form::open(array('route'=>'post_animalfoodtype')) }}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ implode('',$errors->all('<li class="error">:message</li>')) }}
                    </div>
                @endif

                <div class="control-group">
                    {{ Form::label('name','name animal food type:') }}
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>' Name Type'))}}
                </div>
                <br/>
                {{ Form::submit('Create animal type',array('class'=>'btn btn-success')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">List Of Animal Food Types</h3>
            </div>
            @if($animalFoodType->count())
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
                        @foreach($animalFoodType as $animal)
                            <tr>

                                <td>{{ $animal->name }}</td>
                                <td>{{ link_to_route('animalfoodtype_edit','Edit',array($animal->id),array('class'=>'btn btn-warning')) }}</td>
                                <td>
                                    {{ Form::open(array('method'=>'get','route'=>array('destroy_animalfoodtype',$animal->id))) }}
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
                    No animal food type found. Please create one.
                </div>
            @endif
        </div>
    </div>
@include('partials.master-footer')