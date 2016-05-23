
@include('partials.master-header')

<div class="col-md-12">

    <div class="row">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Manage Accounts</h3>
            </div><br>
            <div class="col-md-2">
                <a class="btn btn-primary form-control" href="{{ route('account_create') }}">Create Account</a>
            </div><br><br>

            @if($accounts->count())

                <br/>
                <div class="box-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Account</th>
                            <th>Description</th>
                            <th style="width: 12%;">Initial Balance</th>
                            <th style="width: 12%;">Account Created</th>
                            <th style="width: 14%;">Account Updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $a )
                            <tr>

                                <td>{{ $a->account_name }}</td>
                                <td>{{ substr($a->description,0,120)}}</td>
                                <td>{{ $a->balance . ' £ ' }}</td>
                                <td>
                                    <span class="label label-info">{{ \Carbon\Carbon::createFromTimestamp(strtotime($a->created_at))->diffForHumans() }}</span>
                                </td>
                                <td>
                                    <span class="label label-info">{{ \Carbon\Carbon::createFromTimestamp(strtotime($a->updated_at))->diffForHumans() }}</span>
                                </td>
                                <td>{{ link_to_route('account_edit','Edit',array($a->id),array('class'=>'btn btn-warning')) }}</td>
                                <td>
                                    {!! Form::open(array('method'=>'get','route'=>array('account_destroy',$a->id))) !!}
                                    {!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No accounts found. Please create an account.
                </div>
            @endif
        </div>
    </div>
</div>
@include('partials.master-footer')

