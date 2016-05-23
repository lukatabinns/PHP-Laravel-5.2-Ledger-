@include('partials.master-header')

    <div class="col-md-12">

       <a href="{{ route('account_create') }}">Create a new account</a>
    </div>

    <div class="col-md-12">
        <div class="row">
            <br/>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Animal Records</h3>
                </div>


                @if($animals->count())
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr class="center-text">
                                <th style="width: 9%;">Date</th>
                                <th>animal type</th>
                                <th>breed</th>
                                <th>age</th>
                                <th>sex</th>
                                <th>vaccination</th>
                                <th>amount</th>
                            </tr>
                            </thead>
                            <tbody class="center-text">
                            @foreach($animals as $animal)
                                <tr>
                                    <td>{{ $animal->date }}</td>
                                    <td>{{ $animal->type }}</td>
                                    <td>{{ $animal->name }}</td>
                                    <td>{{ $animal->age }}</td>
                                    <td>{{ $animal->sex }}</td>
                                    <td>{{ $animal->vaccination }}</td>
                                    <td>{{ $animal->amount }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-md-12">
                {{ $animals->links() }}
            </div>
            @else
                <div class="alert alert-info col-md-4" style="margin-top: 15px;">
                    No animals  found.
                </div>
            @endif
        </div>
    </div>
@include('partials.master-footer')